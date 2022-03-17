<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('status_kamar')){
            if($request->get('status_kamar') != 'null'){
                $data = Booking::where('status_kamar', '=' ,$request->status_kamar)->get();
            } else{
                $data = Booking::all();
            }
        } else if($request->has('status_pembayaran')){
            if($request->get('status_pembayaran') != 'null'){
                $data = Booking::where('status_pembayaran', '=' ,$request->status_pembayaran)->get();
            } else {
                $data = Booking::all();
            }
        } else if($request->has('minDate') && $request->has('maxDate'))
        {
            if($request->get('minDate') != "" && $request->get('maxDate') != ""){
                $data = Booking::where('created_at', '>=',$request->minDate)->where('created_at', '<=' ,$request->maxDate)->get();
            } else {
                $data = Booking::all();
            }
        } else{
            $data = Booking::all();
        }
        return view('admin.laporan.index', compact('data'));
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
        //
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
        //
    }
}
