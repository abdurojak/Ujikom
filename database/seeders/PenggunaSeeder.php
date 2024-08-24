<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        // Admin
        DB::table('pengguna')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // password default
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Pengguna Biasa
        DB::table('pengguna')->insert([
            'name' => 'Pengguna',
            'email' => 'pengguna@example.com',
            'password' => Hash::make('password'), // password default
            'role' => 'pengguna',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
