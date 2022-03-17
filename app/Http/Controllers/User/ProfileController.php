<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('users.profiles.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|string',
            'no_telp' => 'required',
        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->errors()->all())->withInput();
        }

        if($request->filled('old_password')){
            if(Hash::check($request->get('old_password'), Auth::user()->password)){
                $validator = Validator::make($data, [
                    'password' => 'required|string|min:8|confirmed'
                ]);
                if($validator->fails()){
                    return back()->with('toast_error', $validator->errors()->all())->withInput();
                }
                $user->update([
                    'password' => Hash::make($data['password']),
                ]);
            } else {
                return back()->with('toast_error', 'Password lama tidak valid')->withInput();
            }
        }
        if($request->hasFile('foto'))
        {
            $path = $request->file('foto')->store('public/files/foto');
            $user->foto = $path;
            $user->save();
        }

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'no_telp' => $data['no_telp'],
        ]);

        return redirect()->back()->with('success', 'Data berhasil di update');
    }

    public function booking_show($id){
        $booking = Booking::find($id);
        return response()->json($booking);
    }

    public function booking_list()
    {
        $id_user = Auth::user()->id;
        $booking = Booking::select('*')->where('id_user', '=', $id_user)->where('status_pembayaran', '=', '0')->with('kamar')->get();
        return view('users.profiles.booking_list', compact('booking'));
    }

    public function booking_history()
    {
        $id_user = Auth::user()->id;
        $booking = Booking::select('*')->where('id_user', '=', $id_user)->where('status_pembayaran', '=', '1')->with('kamar')->get();
        return view('users.profiles.booking_riwayat', compact('booking'));
    }
}
