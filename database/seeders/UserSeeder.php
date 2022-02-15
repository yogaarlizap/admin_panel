<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            [
                'name' => 'Andi',
                'email' => 'andiajalahya@gmail.com',
                'password' => bcrypt('andi1234'),
                'level' => '1'
            ],
            [
                'name' => 'Fauzi',
                'email' => 'fauziajalahya@gmail.com',
                'password' => bcrypt('fauzi1234'),
                'level' => '2'
            ]

        ));
    }
}
