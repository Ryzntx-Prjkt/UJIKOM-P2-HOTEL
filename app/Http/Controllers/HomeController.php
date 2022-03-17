<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kamar;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pegawai = User::whereRaw("role = 'admin' OR role = 'resepsionis'")->get();

        $user = User::where('role', '=', 'user')->get();
        $kamar = Kamar::all();
        $transaksi = Booking::all();
        return view('home', compact('pegawai', 'user', 'kamar', 'transaksi'));
    }
}
