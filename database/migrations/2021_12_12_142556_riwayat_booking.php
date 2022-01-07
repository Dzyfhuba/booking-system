<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RiwayatBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_booking', function (Blueprint $table){
            $table->id();
            $table->integer('id_booking');
            $table->integer('id_verifikasi_pembayaran');
            $table->integer('id_user');
            $table->integer('id_lapangan');
            $table->integer('waktu_booking');
            $table->string('total_pembayaran');
            $table->date('tgl_pembayaran');
            $table->string('bukti_pembayaran');
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
        Schema::dropIfExists('riwayat_booking');
    }
}
