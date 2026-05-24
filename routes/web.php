<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PengaturanController;

Route::get('/', [HomePageController::class, 'create'])->name('home_page');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');
    Route::put('/pengaturan', [PengaturanController::class, 'update'])->name('pengaturan.update');
    Route::delete('/pengaturan', [PengaturanController::class,'destroy'])->name('pengaturan.destroy');
    Route::post('/pengaturan/preferensi', [PengaturanController::class, 'updatePreferensi'])->name('pengaturan.preferensi');
    Route::post('/pengaturan/reset', [PengaturanController::class, 'resetData'])->name('pengaturan.reset');
    Route::get('/pengaturan/ekspor', [PengaturanController::class, 'eksporData'])->name('pengaturan.ekspor');
    Route::post('/pengaturan/hapus-foto', [PengaturanController::class, 'hapusFoto'])->name('pengaturan.hapus_foto');
});

Route::get('/login/google', [AuthenticatedSessionController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [AuthenticatedSessionController::class, 'handleGoogleCallback']);

Route::get('/test-db', function() {
    try {
        DB::connection()->getPdo();
        return 'Koneksi Berhasil';
    } catch(\Exception $e) {
        return "koneksi gagal: " . $e->getMessage();
    }
});
