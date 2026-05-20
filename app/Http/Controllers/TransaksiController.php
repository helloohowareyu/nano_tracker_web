<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TransaksiController extends Controller
{
    public function index()
    {

        $pemasukan = DB::table('transaksis')->where('tipe', 'pemasukan')->get();
        $pengeluaran = DB::table('transaksis')->where('tipe', 'pengeluaran')->get();
        $total = $pemasukan->sum('nominal') - $pengeluaran->sum('nominal');
        return view('transaksi', compact('pemasukan', 'pengeluaran', 'total'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'nominal' => 'required|numeric|min:0',
            'kategori' => 'required|string|max:30',
            'tanggal_waktu' => 'required|date',
            'catatan' => 'nullable|string|max:50'
        ]);

        Transaksi::create([
            'tipe' => $validated['tipe'],
            'nominal' => $validated['nominal'],
            'kategori' => $validated['kategori'],
            'tanggal_waktu' => $validated['tanggal_waktu'],
            'catatan' => $validated['catatan'] ?? null
        ]);

        return redirect()->route('dashboard')->with('success', 'Transaksi berhasil disimpan!');
    }
}