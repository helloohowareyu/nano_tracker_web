<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TransaksiController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $pemasukan = Transaksi::where('user_id', $userId)->where('tipe', 'pemasukan')->sum('nominal');
        $pengeluaran = Transaksi::where('user_id', $userId)->where('tipe', 'pengeluaran')->sum('nominal');
        $total = $pemasukan - $pengeluaran;
        $transaksis = Transaksi::where('user_id', $userId)->orderBy('waktu_transaksi', 'desc')->get();

        $groupedTransaksis = $transaksis->groupBy(function($item) {
            return \Carbon\Carbon::parse($item->waktu_transaksi)->format('d-m-Y');
        });

        return view('transaksi', compact('pemasukan', 'pengeluaran', 'total', 'groupedTransaksis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'nominal' => 'required|numeric|min:0',
            'kategori' => 'required|string|max:30',
            'waktu_transaksi' => 'required|date',
            'catatan' => 'nullable|string|max:50'
        ]);

        Transaksi::create([
            'user_id' => auth()->id(),
            'tipe' => $validated['tipe'],
            'nominal' => $validated['nominal'],
            'kategori' => $validated['kategori'],
            'waktu_transaksi' => $validated['waktu_transaksi'],
            'catatan' => $validated['catatan'] ?? null
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan!');
    }
}