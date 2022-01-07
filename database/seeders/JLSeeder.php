<?php

namespace Database\Seeders;

use App\Models\JLapangan;
use Illuminate\Database\Seeder;

class JLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JLapangan::create([
            'id' => '1',
            'jenis_lapangan'=>'Sintetik'
        ]);
        JLapangan::create([
            'id' => '2',
            'jenis_lapangan'=>'Rumput'
        ]);
        JLapangan::create([
            'id' => '3',
            'jenis_lapangan'=>'Cor'
        ]);
    }
}
