<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspirasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspirasis', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20);
            $table->string('nama', 20);
            $table->enum('kategori', ['Akademik','Minat Bakat', 'Fasilitas', 'Ormawa', 'dll'])->default('dll');
            $table->string('aspirasi');
            $table->longText('image')->nullable();
            $table->enum('status',['pending','accept','dismiss'])->default('pending');
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
        Schema::dropIfExists('aspirasis');
    }
}
