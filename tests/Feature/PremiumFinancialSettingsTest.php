<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PremiumFinancialSettingsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test updating user application preferences (currency and display mode).
     */
    public function test_user_can_update_preferences(): void
    {
        $user = User::factory()->create([
            'mata_uang' => 'Rp',
            'mode_tampilan' => 'light',
        ]);

        $response = $this->actingAs($user)
            ->post(route('pengaturan.preferensi'), [
                'mata_uang' => '$',
                'mode_tampilan' => 'dark',
            ]);

        $response->assertRedirect(route('pengaturan'));
        $response->assertSessionHas('success', 'Preferensi berhasil diperbarui!');

        $user->refresh();
        $this->assertEquals('$', $user->mata_uang);
        $this->assertEquals('dark', $user->mode_tampilan);
    }

    /**
     * Test resetting user transaction history.
     */
    public function test_user_can_reset_transaction_data(): void
    {
        $user = User::factory()->create();

        // Create some transactions
        Transaksi::create([
            'user_id' => $user->id,
            'kategori' => 'Makanan',
            'nominal' => 50000,
            'jenis' => 'pengeluaran',
            'tanggal' => now()->toDateString(),
            'deskripsi' => 'Makan siang',
        ]);

        $this->assertCount(1, Transaksi::where('user_id', $user->id)->get());

        $response = $this->actingAs($user)
            ->post(route('pengaturan.reset'));

        $response->assertRedirect(route('pengaturan'));
        $response->assertSessionHas('success', 'Semua data transaksi Anda telah berhasil direset!');

        $this->assertCount(0, Transaksi::where('user_id', $user->id)->get());
    }

    /**
     * Test exporting user transaction data as CSV.
     */
    public function test_user_can_export_transactions_to_csv(): void
    {
        $user = User::factory()->create();

        Transaksi::create([
            'user_id' => $user->id,
            'kategori' => 'Gaji',
            'nominal' => 10000000,
            'jenis' => 'pemasukan',
            'tanggal' => '2026-05-24',
            'deskripsi' => 'Gaji Bulanan',
        ]);

        $response = $this->actingAs($user)
            ->get(route('pengaturan.ekspor'));

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'text/csv; charset=UTF-8');
        
        $content = $response->streamedContent();
        $this->assertStringContainsString('Gaji Bulanan', $content);
        $this->assertStringContainsString('10000000', $content);
    }

    /**
     * Test deleting user profile photo.
     */
    public function test_user_can_delete_profile_photo(): void
    {
        \Illuminate\Support\Facades\Storage::fake('public');
        
        $user = User::factory()->create([
            'foto_profil' => 'profile_photos/avatar.jpg',
        ]);

        $response = $this->actingAs($user)
            ->post(route('pengaturan.hapus_foto'));

        $response->assertRedirect(route('pengaturan'));
        $response->assertSessionHas('success', 'Foto profil berhasil dihapus!');

        $user->refresh();
        $this->assertNull($user->foto_profil);
    }
}
