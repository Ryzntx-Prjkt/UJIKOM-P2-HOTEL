<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::whereRaw("role != 'user' ")->get();
        return view('admin.akun.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.akun.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $password = $data['password'];
        $cpassword = $data['password_confirmation'];

        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email|string',
            'no_telp' => 'required|numeric',
            'role' => 'required',
            'password' => 'required|string|min:8|confirmed'

        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->errors()->all())->withInput();
        }


            if($password == $cpassword){
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'no_telp' => $data['no_telp'],
                    'role' => $data['role'],
                ]);
                if($request->hasFile('foto')){
                    $path = $request->file('foto')->store('public/files/foto');
                    $user->foto = $path;
                    $user->save();
                }
                Alert::toast('Data Berhasil ditambahkan!');
                return redirect()->route('akun.index');
            } else{
                Alert::toast('Konfirmasi password tidak sesuai!');
                return back()->with('error', 'Konfirmasi password tidak sesuai');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('admin.akun.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.akun.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|string',
            'no_telp' => 'required|numeric',
            'role' => 'required',
        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->errors()->all())->withInput();
        }

        $user->update([
        'name' => $data['name'],
        'email' => $data['email'],
        'no_telp' => $data['no_telp'],
        'role' => $data['role'],
        ]);
        if($request->hasFile('foto')){
            $path = $request->file('foto')->store('public/files/foto');
            $user->foto = $path;
            $user->save();
        }
        if($request->filled('password')){
            $validator = Validator::make($data, [
                'password' => 'required|string|min:8|confirmed'
            ]);
            if($validator->fails()){
                return back()->with('toast_error', $validator->errors()->all())->withInput();
            }
            $password = $data['password'];
            $cpassword = $data['password_confirmation'];

            if($password == $cpassword){
                $user->update([
                    'password' => Hash::make($data['password']),
                ]);
            } else{
                Alert::toast('Konfirmasi password tidak sesuai!');
                return back()->with('error', 'Konfirmasi password tidak sesuai');
            }
        }
        Alert::toast('Data Berhasil diperbarui!');
        return redirect()->route('akun.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Alert::toast('Data berhasil dihapus');
        return redirect()->route('akun.index');
    }
}
