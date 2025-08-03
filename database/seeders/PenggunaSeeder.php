<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama_pengguna' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('123456'),
                'level' => 'Administrator',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pengguna' => 'Petugas',
                'username' => 'petugas',
                'password' => Hash::make('123456'),
                'level' => 'Petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
