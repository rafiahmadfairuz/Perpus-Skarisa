<?php

namespace Database\Factories;

use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LogPinjam>
 */
class LogPinjamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_buku' => Buku::inRandomOrder()->first()->id_buku,
            'id_anggota' => Anggota::inRandomOrder()->first()->id_anggota,
            'tgl_pinjam' => $this->faker->dateTimeBetween('-2 months', 'now')->format('Y-m-d'),
        ];
    }
}
