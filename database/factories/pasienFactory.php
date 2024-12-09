<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pasien>
 */
class pasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_pasiens' => fake()->unique()->randomNumber(8),
            'nama' => fake()->name(),
            'umur' => fake()->numberBetween(20, 50),
            'jenis_kelamin' => fake()->randomElement(['laki-laki', 'perempuan']),
            'alamat' => fake()->address(),
        ];
    }
}
