<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TransaksiController extends Controller
{
    public function index()
    {
        $pemasukan = Transaksi::where('tipe', 'pemasukan')->sum('nominal');
        $pengeluaran = Transaksi::where('tipe', 'pengeluaran')->sum('nominal');
        $total = $pemasukan - $pengeluaran;
        $transaksis = Transaksi::orderBy('tanggal_waktu', 'desc')->get();

        $groupedTransaksis = $transaksis->groupBy(function($item) {
            return \Carbon\Carbon::parse($item->tanggal_waktu)->format('d-m-Y');
        });

        return view('transaksi', compact('pemasukan', 'pengeluaran', 'total', 'groupedTransaksis'));
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

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan!');
    }
}