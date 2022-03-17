<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Kamar;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(){
        $booking = Booking::where('status_pembayaran', '=', '0')->get();
        return view('resepsionis.transaksi.index', compact('booking'));
    }

    public function show($id){
        $booking = Booking::find($id);
        return view('resepsionis.transaksi.detail', ['booking' => $booking]);
    }

    public function update(Request $request, $id){
        $data = $request->all();

        $booking = Booking::findOrFail($id);
        $booking->update([
            'status_pembayaran' => '1',
            'status_kamar' => '2'
        ]);
        // dd($booking);
        return redirect()->route('booking_index')->with('success', 'Data Booking berhasil di update!');
    }

    public function riwayat_booking()
    {
        $booking = Booking::where('status_pembayaran', '=', '1')->with('user','kamar')->get();
        return view('resepsionis.history.index', ['booking' => $booking]);
    }

    public function riwayat_booking_update(Request $request){
        $data = $request->all();
        $booking = Booking::find($data['id_booking']);
        $get = $booking->select('*')->where('id', '=', $data['id_booking'])->with('kamar')->get();

        $id_kamar = $get[0]['id_kamar'];

        $stock = $get[0]['kamar']['stock'];
        $jumlah_kamar = $get[0]['jumlah_kamar'];
        $hasil = ($stock + $jumlah_kamar);

        $booking->update([
            'status_kamar' => $data['status_kamar']
        ]);

        $kamar = Kamar::find($id_kamar);
        $kamar->update([
            'stock' => $hasil
        ]);

        return response()->json([
            'message' => 'New post created'
        ]);
    }
}
