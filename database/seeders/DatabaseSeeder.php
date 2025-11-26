<?php

namespace Database\Seeders;

use App\Models\Registrant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            MajorSeeder::class,
            SettingSeeder::class,
            AnnouncementSeeder::class,
        ]);

        Registrant::factory()
            ->count(28)
            ->hasAddress(1)
            ->hasGuardians(2)
            ->hasAcademic(1)
            ->create();
    }
}
