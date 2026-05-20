<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $pemasukan = Transaksi::where('tipe', 'pemasukan')->sum('nominal');
        $pengeluaran = Transaksi::where('tipe', 'pengeluaran')->sum('nominal');
        $total = $pemasukan - $pengeluaran;

        // Get expense sum grouped by category
        $pengeluaranKategori = Transaksi::where('tipe', 'pengeluaran')
            ->select('kategori', DB::raw('SUM(nominal) as total'))
            ->groupBy('kategori')
            ->orderBy('total', 'desc')
            ->get();

        // Get income sum grouped by category
        $pemasukanKategori = Transaksi::where('tipe', 'pemasukan')
            ->select('kategori', DB::raw('SUM(nominal) as total'))
            ->groupBy('kategori')
            ->orderBy('total', 'desc')
            ->get();

        // Get 5 latest transactions
        $latestTransaksis = Transaksi::orderBy('tanggal_waktu', 'desc')
            ->take(5)
            ->get();

        // Group the 5 latest transactions by date
        $groupedLatestTransaksis = $latestTransaksis->groupBy(function($item) {
            return \Carbon\Carbon::parse($item->tanggal_waktu)->format('d-m-Y');
        });

        return view('dashboard', compact(
            'pemasukan', 
            'pengeluaran', 
            'total', 
            'pengeluaranKategori', 
            'pemasukanKategori', 
            'groupedLatestTransaksis'
        ));
    }
}