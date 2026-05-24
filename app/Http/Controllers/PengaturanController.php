<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $pemasukan = \App\Models\Transaksi::where('user_id', $userId)->where('tipe', 'pemasukan')->sum('nominal');
        $pengeluaran = \App\Models\Transaksi::where('user_id', $userId)->where('tipe', 'pengeluaran')->sum('nominal');
        $total = $pemasukan - $pengeluaran;

        return view('pengaturan', compact('pemasukan', 'pengeluaran', 'total'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        \Log::info('Update profile attempt', [
            'user_id' => $user->id,
            'has_file' => $request->hasFile('foto_profil'),
            'all_request_data' => $request->all()
        ]);

        try {
            $validated = $request->validate([
                'nama_lengkap' => 'required|string|max:50',
                'email' => 'required|email|max:100|unique:users,email,' . $user->id,
                'password' => 'nullable|string',
            ]);

            \Log::info('Validation passed', ['validated' => $validated]);

            // Update nama_lengkap dan email
            $user->nama_lengkap = $validated['nama_lengkap'];
            $user->email = $validated['email'];

            // Update password jika diisi
            if (!empty($validated['password'])) {
                $user->password = Hash::make($validated['password']);
            }

            // Handle upload foto profil - simpan sebagai file
            if ($request->filled('foto_profil_base64')) {
                try {
                    $base64Data = $request->input('foto_profil_base64');
                    \Log::info('Base64 data received', ['length' => strlen($base64Data)]);

                    // Decode base64 dan simpan sebagai file
                    $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Data));

                    // Buat nama file unik berdasarkan user ID dan timestamp
                    $fileName = 'profile_' . $user->id . '_' . time() . '.png';

                    // Simpan file di storage/app/public/profiles
                    $filePath = 'profiles/' . $fileName;
                    \Storage::disk('public')->put($filePath, $imageData);

                    // Simpan path file ke database
                    $user->foto_profil = $filePath;
                    \Log::info('Profile photo saved as file', ['path' => $filePath]);
                } catch (\Exception $e) {
                    \Log::error('Foto upload error: ' . $e->getMessage());
                }
            } else {
                \Log::info('No base64 data received');
            }

            $user->save();
            \Log::info('User saved successfully');

            return redirect()->route('pengaturan')->with('success', 'Profil berhasil diperbarui!');
        } catch (\Exception $e) {
            \Log::error('Update profile error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(Request  $request) {
        $user = auth()->user();

        // Menghapus foto profil
        if ($user->foto_profil) {
            \Storage::disk('public')->delete($user->foto_profil);
        }

        // Hapus transaksi yang terkait dengan akun ini
        $user->transaksis()->delete();

        // Menghapus data user dari database (permanen)
        $user->delete();

        // Keluar sesi
        auth()->logout();

        // Destroy sesi
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Kembali ke homepage
        return redirect('/')->with('success', 'Akun Anda telah berhasil dihapus.');
    }

    public function updatePreferensi(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'mata_uang' => 'required|string|in:Rp,$,€,¥',
            'mode_tampilan' => 'required|string|in:light,dark',
        ]);

        try {
            $user->mata_uang = $validated['mata_uang'];
            $user->mode_tampilan = $validated['mode_tampilan'];
            $user->save();

            return redirect()->route('pengaturan')->with('success', 'Preferensi aplikasi berhasil diperbarui!');
        } catch (\Exception $e) {
            \Log::error('Error update preferensi: ' . $e->getMessage());
            return back()->with('error', 'Gagal memperbarui preferensi: ' . $e->getMessage());
        }
    }

    public function resetData()
    {
        $user = auth()->user();

        try {
            $user->transaksis()->delete();
            return redirect()->route('pengaturan')->with('success', 'Semua data transaksi Anda telah berhasil direset!');
        } catch (\Exception $e) {
            \Log::error('Error reset data: ' . $e->getMessage());
            return back()->with('error', 'Gagal mereset data: ' . $e->getMessage());
        }
    }

    public function eksporData()
    {
        $user = auth()->user();
        $transaksis = $user->transaksis()->orderBy('waktu_transaksi', 'desc')->get();

        $filename = 'riwayat_transaksi_' . strtolower(str_replace(' ', '_', $user->nama_lengkap)) . '_' . date('Ymd_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $callback = function() use ($transaksis) {
            $file = fopen('php://output', 'w');
            
            // Tambahkan UTF-8 BOM untuk MS Excel agar membaca encoding dengan benar
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // Judul kolom CSV
            fputcsv($file, ['No', 'Tanggal', 'Waktu', 'Nama Transaksi', 'Tipe', 'Kategori', 'Nominal', 'Catatan']);

            $no = 1;
            foreach ($transaksis as $t) {
                // Formatting data
                $tanggal = \Carbon\Carbon::parse($t->waktu_transaksi)->translatedFormat('d-m-Y');
                $waktu = \Carbon\Carbon::parse($t->waktu_transaksi)->format('H:i');
                
                fputcsv($file, [
                    $no++,
                    $tanggal,
                    $waktu,
                    $t->nama_transaksi,
                    ucfirst($t->tipe),
                    ucfirst($t->kategori),
                    $t->nominal,
                    $t->catatan ?: '-'
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function hapusFoto()
    {
        $user = auth()->user();

        if ($user->foto_profil) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($user->foto_profil);
            $user->foto_profil = null;
            $user->save();
        }

        return redirect()->route('pengaturan')->with('success', 'Foto profil berhasil dihapus!');
    }
}
