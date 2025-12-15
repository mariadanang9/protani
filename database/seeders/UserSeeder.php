<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin/Test User
        User::create([
            'name' => 'Ariiq Test',
            'email' => 'ariiq@protani.com',
            'password' => Hash::make('password123'),
            'phone' => '081234567890',
            'address' => 'Jl. Raya Sukaraja No. 123, Bandung, Jawa Barat'
        ]);

        // Dummy Users
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => Hash::make('password123'),
            'phone' => '081298765432',
            'address' => 'Jl. Merdeka No. 45, Jakarta'
        ]);

        User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti@example.com',
            'password' => Hash::make('password123'),
            'phone' => '081387654321',
            'address' => 'Jl. Pahlawan No. 67, Surabaya'
        ]);
    }
}
