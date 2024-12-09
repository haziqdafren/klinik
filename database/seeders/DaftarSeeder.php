<?php

namespace Database\Seeders;

use App\Models\Poli;
use App\Models\Daftar;
use App\Models\pasien;
use Illuminate\Database\Seeder;
use Database\Factories\pasienFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        pasien::factory()->count(50)->create();
        Daftar::factory()->count(50)->create();
        Poli::factory()->count(5)->create();
    }
}
