<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

use App\Models\Kamar;

use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index($kamar_id){
        $kode = mt_rand(111111111,999999999);
        $kamar = Kamar::find($kamar_id);
        return view('users.booking.index', compact('kamar', 'kode'));
    }

    public function store(Request $request){
        $id_user = Auth::user()->id;
        $id_kamar = $request->get('id_kamar');
        $data = $request->all();
        Booking::create([
            'kode_booking' => $data['kode_booking'],
            'id_user' => $id_user,
            'id_kamar' => $id_kamar,
            'nama_tamu' => $data['nama_tamu'],
            'tgl_checkin' => $data['check_in'],
            'tgl_checkout' => $data['check_out'],
            'jumlah_kamar' => $data['jumlah_kamar'],
            'total_harga' => $data['total_harga'],
            'status_pembayaran' => '0',
            'status_kamar' => '0',
        ]);
        $stock_kamar = Kamar::find($id_kamar);
         $stock_update = $stock_kamar['stock'] - $data['jumlah_kamar'];


        $kamar = Kamar::find($id_kamar);
        $kamar->update([
            'stock' => $stock_update
        ]);
        return redirect()->route('booking_list')->with('success', 'Berhasil melakukan booking');
    }

    public function print_struk(){

    }
}
