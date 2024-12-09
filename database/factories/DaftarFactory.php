<?php

namespace Database\Factories;

use App\Models\Poli;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Daftar>
 */
class DaftarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idPasien = \App\Models\Pasien::pluck('id')->toArray();
        $idPoli = Poli::pluck('id')->toArray();  // Get all valid poli IDs if it's a foreign key.

        return [
            'pasien_id' => $this->faker->randomElement($idPasien),
            'tanggal_daftar' => $this->faker->date(),
            'poli_id' => $this->faker->randomElement($idPoli),  // Use the correct column name 'poli_id'
            'keluhan' => $this->faker->sentence(),
            'diagnosis' => $this->faker->sentence(),
            'tindakan' => $this->faker->sentence(),
        ];
    }
}
