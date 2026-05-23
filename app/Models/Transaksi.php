<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';

    protected $fillable = [
        'user_id',
        'tipe',
        'nominal',
        'kategori',
        'waktu_transaksi',
        'catatan'
    ];

    protected $casts = [
        'nominal' => 'decimal:2',
        'waktu_transaksi' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
