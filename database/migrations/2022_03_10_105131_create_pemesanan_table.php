<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_booking');
            $table->integer('id_user');
            $table->integer('id_kamar');
            $table->string('nama_tamu');
            $table->date('tgl_checkin');
            $table->date('tgl_checkout');
            $table->double('jumlah_kamar');
            $table->double('total_harga');
            $table->enum('status_pembayaran', ['0', '1']);
            $table->enum('status_kamar', ['0', '1', '2']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
};
