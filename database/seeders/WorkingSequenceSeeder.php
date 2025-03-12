<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkingSequenceSeeder extends Seeder
{
    public function run()
    {
        // DB::table('working_sequences')->truncate();

        DB::table('working_sequences')->insert([
            [
                'working_sequence_code' => 'SW1-LV', 
                'person_required' => 1,
                'multiwi_id' => 2,
                'process_code' => 'LV',
                'process_name' => 'ROLL LEVELLER', 
                'work_center_code' => 'SW1',
                'work_center_name' => 'FABRIKASI', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'working_sequence_code' => 'SW1-HP',
                'person_required' => null,
                'multiwi_id' => 2,
                'process_code' => 'HP',
                'process_name' => 'HYDRAULIC PRESS',
                'work_center_code' => 'SW1',
                'work_center_name' => 'FABRIKASI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'working_sequence_code' => 'SW1-DR',
                'person_required' => null,
                'multiwi_id' => 2,
                'process_code' => 'DR',
                'process_name' => 'DRILLING',
                'work_center_code' => 'SW1',
                'work_center_name' => 'FABRIKASI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'working_sequence_code' => 'SW1-BS',
                'person_required' => null,
                'multiwi_id' => 1,
                'process_code' => 'BS',
                'process_name' => 'BANDSAW',
                'work_center_code' => 'SW1',
                'work_center_name' => 'FABRIKASI',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
