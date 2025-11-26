<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Announcement::create([
            'title' => 'Penerimaan Peserta Didik Baru 2025/2026',
            'content' => 'Pendaftaran PPDB SMK Rohmatul Ummah Tahun Ajaran 2025/2026 dibuka mulai tanggal 1 Januari 2025 sampai 31 Juli 2025. Daftarkan diri Anda sekarang!',
            'published_at' => '2025-01-01',
            'expired_at' => '2025-07-31',
            'is_active' => true
        ]);
    }
}
