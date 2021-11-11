<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Seeder;

class UDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = UserDetail::create([
        	'nik' => '3525123443211234',
            'email' => 'naufalalief4253@gmail.com',
            'namalengkap' => 'Naufal Alief',
        	'alamat' => 'Panglima Sudirman VI/7',
            'ttl' => 'Gresik, 02-12-2000',
            'nohp' => '081357056860'
        ]);
    }
}
