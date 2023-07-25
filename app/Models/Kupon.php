<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Kupon extends Model
{
    protected $table = 'kupons';
    protected $fillable = [
        'nama_kupon',
        'wahana_id',
        'deskripsi',
    ];

    public function wahana()
    {
        return $this->belongsTo(Wahana::class);
    }

    public function pemesanan()
    {
        return $this->hasOne(Pemesanan::class, 'kupon_id');
    }

    // Any additional model-specific logic or relationships can be defined here
}
