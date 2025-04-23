<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('working_sequences')->truncate();

        DB::table('users')->insert([
            [
                'nip' => '220411100107', 
                'name' => 'Reiky',
                'email' => 'nihimura09125@gmail.com',
                'password' => bcrypt('200204'),
                'plant_id' => 3, 
                'id_cards' => '01',
                'role_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => '220411100126', 
                'name' => 'Hexen',
                'email' => 'astashima@gmail.com',
                'password' => bcrypt('123456'),
                'plant_id' => 2, 
                'id_cards' => '02',
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => '220411100064', 
                'name' => 'Djaylano',
                'email' => 'pa.langeldra@gmail.com',
                'password' => bcrypt('654321'),
                'plant_id' => 1, 
                'id_cards' => '03',
                'role_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => '220411100129', 
                'name' => 'Naka',
                'email' => 'nakashimaedmund@gmail.com',
                'password' => bcrypt('111111'),
                'plant_id' => 3, 
                'id_cards' => '04',
                'role_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
