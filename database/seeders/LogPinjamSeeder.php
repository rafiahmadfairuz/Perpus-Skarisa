<?php

namespace Database\Seeders;

use App\Models\LogPinjam;
use App\Models\Sirkulasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LogPinjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sirkulasis = Sirkulasi::all();

        foreach ($sirkulasis as $sirkulasi) {
            LogPinjam::create([
                'id_buku'          => $sirkulasi->id_buku,
                'id_anggota'       => $sirkulasi->id_anggota,
                'tgl_pinjam'       => $sirkulasi->tgl_pinjam,
            ]);
        }
    }
}
