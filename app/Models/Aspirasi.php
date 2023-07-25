<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;
    protected $table = 'aspirasis';
    protected $guarded = [];
    protected $fillable = [
        'nim',
        'nama',
        'kategori',
        'aspirasi',
        'image',
        'status',
    ];
}
