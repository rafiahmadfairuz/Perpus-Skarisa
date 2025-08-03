<?php

namespace Database\Seeders;

use App\Models\Buku;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Anggota;
use App\Models\LogPinjam;
use App\Models\Sirkulasi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PenggunaSeeder::class,
            AnggotaSeeder::class,
            BukuSeeder::class,
            SirkulasiSeeder::class,
            LogPinjamSeeder::class,
        ]);
    }
}
