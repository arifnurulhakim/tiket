<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemensanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemensanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nomor_tlpn');
            $table->date('tanggal_kunjungan');
            $table->unsignedBigInteger('kupon_id')->nullable();
            $table->foreign('kupon_id')->references('id')->on('kupons')->onDelete('set null');
            $table->integer('quantity');
            $table->longText('bukti_pembayaran')->nullable();
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
        Schema::dropIfExists('pemensanans');
    }
}
