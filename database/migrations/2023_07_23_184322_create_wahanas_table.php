<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWahanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wahanas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wahana');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga_weekday', 15, 2);
            $table->decimal('harga_weekend', 15, 2);
            $table->longText('foto_wahana')->nullable();
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
        Schema::dropIfExists('wahanas');
    }
}
