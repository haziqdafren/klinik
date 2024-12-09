<?php

namespace Database\Seeders;

use App\Models\Poli;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Poli::table('polis')->insert([
            ['name' => 'Poli Umum'],
            ['name' => 'Poli Gigi'],
            ['name' => 'Poli Perawatan'],
        ]);
    }
}
