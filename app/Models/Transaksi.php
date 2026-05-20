<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';

    protected $fillable = [
        'tipe',
        'nominal',
        'kategori',
        'tanggal_waktu',
        'catatan'
    ];

    protected $casts = [
        'nominal' => 'decimal:2',
        'tanggal_waktu' => 'datetime',
    ];
}
