<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majors = [
            [
                'code' => 'TKJ',
                'name' => 'Teknik Komputer dan Jaringan',
                'quota' => 36,
                'description' => 'Program keahlian yang mempelajari tentang cara instalasi PC, instalasi LAN, memperbaiki PC, dan mempelajari program software.',
            ],
            [
                'code' => 'RPL',
                'name' => 'Rekayasa Perangkat Lunak',
                'quota' => 36,
                'description' => 'Program keahlian yang mempelajari dan mendalami semua cara-cara pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak dan manajemen kualitas.',
            ],
            [
                'code' => 'OTKP',
                'name' => 'Otomasi dan Tata Kelola Perkantoran',
                'quota' => 36,
                'description' => 'Program keahlian yang mempelajari tentang pengelolaan dan penanganan administrasi kantor dan kesekretarisan.',
            ],
            [
                'code' => 'AKL',
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'quota' => 36,
                'description' => 'Program keahlian yang mempelajari tentang pengelolaan keuangan, pencatatan transaksi, dan pelaporan keuangan.',
            ],
        ];

        foreach ($majors as $major) {
            Major::create($major);
        }
    }
}
