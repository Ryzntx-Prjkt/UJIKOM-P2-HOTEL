<?php

use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\FasilitasHotelController;
use App\Http\Controllers\Admin\KamarController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/detail-kamar/{id}', [WelcomeController::class, 'detail_kamar'])->name('detail_kamar');

Auth::routes();

Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('role:admin')->name('home');
    Route::resource('kamar', KamarController::class);
    Route::post('/fasilitas-store', [KamarController::class, 'fasilitas_store'])->name('fasilitas-store');
    Route::post('/fasilitas-update', [KamarController::class, 'fasilitas_update'])->name('fasilitas-update');
    Route::delete('/fasilitas-destroy/{id}', [KamarController::class, 'fasilitas_delete'])->name('fasilitas-destroy');
    Route::resource('akun', AkunController::class);
    Route::resource('fasilitas-hotel', FasilitasHotelController::class);

    Route::resource('laporan', LaporanController::class);

    //Pengaturan
    Route::get('/settings/hotel', [SettingsController::class, 'hotel_settings'])->name('hotel_setting');
});

Route::prefix('resepsionis')->middleware('role:resepsionis')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('role:resepsionis')->name('home');
    Route::get('/transaksi/booking', [TransaksiController::class, 'index'])->name('booking_index');
    Route::get('/transaksi/booking/show/{id}', [TransaksiController::class, 'show'])->name('booking_detail');
    Route::put('/transaksi/booking/update/{id}', [TransaksiController::class, 'update'])->name('booking_update');

    Route::get('/transaksi/history', [TransaksiController::class, 'riwayat_booking'])->name('history_index');
    Route::post('/transaksi/history/update', [TransaksiController::class, 'riwayat_booking_update'])->name('history_update');

});

Route::prefix('user')->middleware('role:user')->group(function () {
    Route::get('/book-kamar/{id}', [BookingController::class, 'index'])->name('book_kamar');
    Route::resource('booking', BookingController::class);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile_user');
    Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile_update');
    Route::get('/booking_list', [ProfileController::class, 'booking_list'])->name('booking_list');
    Route::get('/booking_history', [ProfileController::class, 'booking_history'])->name('booking_history');
    Route::get('/booking_show/{id}', [ProfileController::class, 'booking_show'])->name('booking_show');
});

