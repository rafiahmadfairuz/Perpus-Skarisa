<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggota>
 */
class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'jekel' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'kelas' => $this->faker->randomElement(['X', 'XI', 'XII']) . ' ' . strtoupper($this->faker->randomLetter()),
            'no_hp' => $this->faker->phoneNumber,
        ];
    }
}
