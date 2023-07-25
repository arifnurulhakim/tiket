<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Wahana extends Model
{
    protected $table = 'wahanas';
    protected $fillable = [
        'nama_wahana',
        'deskripsi',
        'harga_weekday',
        'harga_weekend',
        'foto_wahana',
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'wahana_id');
    }

    // Any additional model-specific logic or relationships can be defined here
}
