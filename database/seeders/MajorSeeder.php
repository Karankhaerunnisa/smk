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
                'code' => 'DKV',
                'name' => 'Desain Komunikasi Visual',
                'quota' => 50,
                'description' => 'Jurusan DKV (Desain Komunikasi Visual) mempelajari cara menyampaikan pesan melalui elemen visual seperti gambar, warna, dan teks untuk menciptakan karya yang efektif dan menarik.',
            ],
        ];

        foreach ($majors as $major) {
            Major::create($major);
        }
    }
}
