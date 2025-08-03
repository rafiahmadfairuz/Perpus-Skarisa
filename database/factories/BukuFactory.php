<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // database/factories/BukuFactory.php
    public function definition(): array
    {
        return [
            'judul_buku' => $this->faker->sentence(3),
            'pengarang'  => $this->faker->name,
            'penerbit'   => $this->faker->company,
            'th_terbit'  => $this->faker->year,
        ];
    }
}
