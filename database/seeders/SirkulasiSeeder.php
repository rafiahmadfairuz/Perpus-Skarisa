<?php

namespace Database\Seeders;

use App\Models\Sirkulasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SirkulasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jumlah = 10;

        for ($i = 1; $i <= $jumlah; $i++) {
            $sirkulasi = Sirkulasi::factory()->make();

            Sirkulasi::create([
                'id_sirkulasi'     => 'SIR' . str_pad($i, 3, '0', STR_PAD_LEFT), // SIR001
                'id_buku'          => $sirkulasi->id_buku,
                'id_anggota'       => $sirkulasi->id_anggota,
                'tgl_pinjam'       => $sirkulasi->tgl_pinjam,
                'tgl_kembali'      => $sirkulasi->tgl_kembali,
                'tgl_dikembalikan' => $sirkulasi->tgl_dikembalikan,
                'status'           => $sirkulasi->status,
            ]);
        }
    }
}
