<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jumlah = 10;

        for ($i = 1; $i <= $jumlah; $i++) {
            $anggota = Anggota::factory()->make();

            Anggota::create([
                'id_anggota' => 'A' . str_pad($i, 3, '0', STR_PAD_LEFT), // A001, A002, dst
                'nama'       => $anggota->nama,
                'jekel'      => $anggota->jekel,
                'kelas'      => $anggota->kelas,
                'no_hp'      => $anggota->no_hp,
            ]);
        }
    }
}
