<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poli>
 */
class PoliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->randomElement(['Anak','Jiwa','Kandungan','Penyakit Dalam','Gizi']),
            'biaya' => $this->faker->numberBetween(['30000','1000000']),
            'keterangan' =>$this->faker->sentence(),
        ];
    }
}
