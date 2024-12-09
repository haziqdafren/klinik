<?php

namespace Database\Seeders;

use App\Models\Poli;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Daftar;
use App\Models\pasien;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    //     // User::factory(10)->create();

    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
    Poli::factory()->count(50)->create();
        pasien::factory()->count(50)->create();
        Daftar::factory()->count(50)->create();
        
    }
}
