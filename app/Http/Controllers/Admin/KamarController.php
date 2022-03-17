<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FasilitasKamar;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Alert;

class KamarController extends Controller
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
        $data = Kamar::all();
        return view('admin.kamar.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kamar.create');
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
        $kamar = Kamar::create([
            'tipe_kamar' => $data['tipe_kamar'],
            'harga' => $data['harga'],
            'stock' => $data['stock'],
            'deskripsi' => $data['deskripsi'],
        ]);
        if($request->hasFile('foto'))
        {
            $path = $request->file('foto')->store('public/files');
            $kamar->foto = $path;
            $kamar->save();
        }
        Alert::toast('Data Berhasil ditambahkan!');
        return redirect()->route('kamar.index')->with('success', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Kamar::find($id);
        $fasilitas = FasilitasKamar::whereRaw('id_kamar ='.$id)->get();
        return view('admin.kamar.show', compact('data', 'fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kamar::find($id);
        return view('admin.kamar.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $kamar = Kamar::find($id);
        $kamar->update([
            'tipe_kamar' => $data['tipe_kamar'],
            'harga' => $data['harga'],
            'stock' => $data['stock'],
        ]);
        if($request->hasFile('foto'))
        {
            $path = $request->file('foto')->store('public/files');
            $kamar->foto = $path;
            $kamar->save();
        }
        Alert::toast('Data Berhasil diperbarui!');
        return redirect()->route('kamar.index')->with('success', 'Data Berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kamar = Kamar::find($id);
        $kamar->delete();
        Alert::toast('Data berhasil dihapus!');
        return redirect()->route('kamar.index')->with('success', 'Data berhasil dihapus!');
    }

    public function fasilitas_store(Request $request){
        $data = $request->all();
        $fasilitas = FasilitasKamar::create([
            'fasilitas' => $data['fasilitas'],
            'kategori' => $data['kategori'],
            'id_kamar' => $data['id'],
            'deskripsi' => $data['deskripsi'],
        ]);
        if($request->hasFile('foto'))
        {
            $path = $request->file('foto')->store('public/files/fasilitas');
            $fasilitas->foto = $path;
            $fasilitas->save();
        }
        Alert::toast('Data fasilitas berhasil ditambahkan!');
        return redirect()->back()->with('success', 'Data fasilitas berhasil ditambahkan!');
    }

    public function fasilitas_delete($id)
    {
        $fasilitas = FasilitasKamar::find($id);
        $fasilitas->delete();
        Alert::toast('Fasilitas berhasil dihapus!');
        return back()->with('success','Fasilitas berhasil dihapus!');
    }

    public function fasilitas_update(Request $request)
    {
        $data = $request->all();
        $fasilitas = FasilitasKamar::find($data['id_fasilitas']);
        $fasilitas->update([
            'status' => $data['status']
        ]);
        return response()->json([
            'message' => 'Berhasil di update'
        ]);
    }
}
