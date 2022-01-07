<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LapanganTerbooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapangan_terbooking', function (Blueprint $table) {
            $table->id();
            $table->integer('id_verifikasi_pembayaran');
            $table->integer('id_booking');
            $table->integer('id_lapangan');
            $table->integer('id_provider');
            $table->integer('id_user');
            $table->date('tgl_booking');
            $table->integer('waktu_booking');
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
        Schema::dropIfExists('lapangan_terbooking');
    }
}
