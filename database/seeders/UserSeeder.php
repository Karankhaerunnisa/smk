<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            // Admin
            [
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin321'), // Change this in production!
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
