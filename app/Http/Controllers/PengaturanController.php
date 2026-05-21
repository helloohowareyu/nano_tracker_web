<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    public function index()
    {
        $pemasukan = \App\Models\Transaksi::where('tipe', 'pemasukan')->sum('nominal');
        $pengeluaran = \App\Models\Transaksi::where('tipe', 'pengeluaran')->sum('nominal');
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
}
