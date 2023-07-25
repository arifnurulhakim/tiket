<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeris';
    protected $fillable = [
        'nama_foto',
        'deskripsi',
        'foto_galeri',
    ];

    // Any additional model-specific logic or relationships can be defined here
}
