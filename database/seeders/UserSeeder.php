<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Naufal Alief',
        	'email' => 'naufalalief087@gmail.com',
            'password' => bcrypt('123qweasd')
        ]);
        $user->assignRole('user');

        $user = User::create([
        	'name' => 'Naufal Alief',
        	'email' => 'naufalalief4253@gmail.com',
            'password' => bcrypt('123qweasd')
        ]);
        $user->assignRole('provider');

    }
}
