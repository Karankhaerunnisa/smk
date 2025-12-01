<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'school_name',
                'value' => 'SMK Rohmatul Ummah',
                'type' => 'string'
            ],
            [
                'key' => 'school_address',
                'value' => 'Baladil Amin, Pulutan, 005/003, Jekulo Kudus',
                'type' => 'string'
            ],
            [
                'key' => 'school_phone',
                'value' => '+62 877-5418-9830',
                'type' => 'string'
            ],
            [
                'key' => 'school_email',
                'value' => 'smkrohum@gmail.com ',
                'type' => 'string'
            ],

            // Registration Config
            [
                'key' => 'academic_year',
                'value' => '2026/2027',
                'type' => 'string'
            ],
            [
                'key' => 'registration_start_date',
                'value' => '2026-01-01',
                'type' => 'date'
            ],
            [
                'key' => 'registration_end_date',
                'value' => '2026-08-15',
                'type' => 'date'
            ],
            [
                'key' => 'is_registration_open',
                'value' => '1',
                'type' => 'boolean'
            ],

            // Assets
            [
                'key' => 'app_logo',
                'value' => 'school-logo.jpg',
                'type' => 'string'
            ],

            [
                'key' => 'document_header',
                'value' => 'letter-head.png',
                'type' => 'string'
            ],

            // Committee Info
            [
                'key' => 'committee_head_name',
                'value' => 'Aufa Shihabudin Ridho',
                'type' => 'string'
            ],
            [
                'key' => 'committee_head_nip',
                'value' => '',
                'type' => 'string'
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create([
                'key' => $setting['key'],
                'value' => $setting['value'],
                'type' => $setting['type']
            ]);
        }
    }
}
