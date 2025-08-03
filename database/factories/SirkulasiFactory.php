<?php

namespace Database\Factories;

use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sirkulasi>
 */
class SirkulasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tgl_pinjam = $this->faker->dateTimeBetween('-1 month', 'now');
        $tgl_kembali = (clone $tgl_pinjam)->modify('+7 days');
        $tgl_dikembalikan = (clone $tgl_kembali)->modify('+' . rand(0, 3) . ' days');

        return [
            // id_sirkulasi akan diisi nanti di Seeder
            'id_buku' => Buku::inRandomOrder()->value('id_buku'),
            'id_anggota' => Anggota::inRandomOrder()->value('id_anggota'),
            'tgl_pinjam' => $tgl_pinjam->format('Y-m-d'),
            'tgl_kembali' => $tgl_kembali->format('Y-m-d'),
            'tgl_dikembalikan' => $tgl_dikembalikan->format('Y-m-d'),
            'status' => $this->faker->randomElement(['PIN', 'KEM']),
        ];
    }
}
