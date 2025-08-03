<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jumlah = 10;

        for ($i = 1; $i <= $jumlah; $i++) {
            $buku = Buku::factory()->make();

            Buku::create([
                'id_buku'     => 'B' . str_pad($i, 3, '0', STR_PAD_LEFT), // B001, B002, dst
                'judul_buku' => $buku->judul_buku,
                'pengarang'  => $buku->pengarang,
                'penerbit'   => $buku->penerbit,
                'th_terbit'  => $buku->th_terbit,
            ]);
        }
    }
}
