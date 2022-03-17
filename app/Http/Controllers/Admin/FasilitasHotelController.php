<?php

namespace App\Http\Controllers\Admin;

use App\Models\FasilitasHotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;

class FasilitasHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FasilitasHotel::all();
        return view('admin.hotel.fasilitas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $fasilitas =  FasilitasHotel::create($data);
        if($request->hasFile('foto'))
        {
            $path = $request->file('foto')->store('public/files');
            $fasilitas->foto = $path;
            $fasilitas->save();
        }
        Alert::toast('Data fasilitas hotel berhasil ditambahkan!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fasilitas = FasilitasHotel::find($id);
        $fasilitas->delete();
        return redirect()->route('fasilitas-hotel.index');
    }
}
