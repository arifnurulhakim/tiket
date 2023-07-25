<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanans';
    protected $fillable = [
        'nama',
        'nomor_tlpn',
        'tanggal_kunjungan',
        'kupon_id',
        'quantity',
        'bukti_pembayaran',
        'kode_pemesanan'
    ];

    public function kupon()
    {
        return $this->belongsTo(Kupon::class, 'kupon_id');
    }
    // Any additional model-specific logic or relationships can be defined here
}


