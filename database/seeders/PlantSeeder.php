<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plant;

class PlantSeeder extends Seeder
{
    public function run()
    {
        $data = ['INKA MADIUN', 'IMS SBU AC', 'IMS BAGI'];

        foreach ($data as $plant) {
            Plant::firstOrCreate(['name' => $plant]);
        }
    }
}
