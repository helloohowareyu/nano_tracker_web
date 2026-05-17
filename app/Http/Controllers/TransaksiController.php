<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function simpan(Request $request)
    {
        // validasi
        $request->validate([
            'tipe' => 'required',
            'nominal' => 'required|numeric',
            'kategori' => 'required',
            'waktu_transaksi' => 'required',
            'catatan' => 'nullable'
        ]);

        // simpan data
        Transaksi::create([
            'tipe' => $request->tipe,
            'nominal' => $request->nominal,
            'kategori' => $request->kategori,
            'waktu_transaksi' => $request->waktu_transaksi,
            'catatan' => $request->catatan
        ]);

        return redirect()->route('dashboard')->with('success', 'Data berhasil disimpan!');
    }
}
