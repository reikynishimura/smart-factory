<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MultiWI;

class MultiWISeeder extends Seeder
{
    public function run()
    {
        $data = ['Ya', 'Tidak'];

        foreach ($data as $multiwi) {
            MultiWI::firstOrCreate(['name' => $multiwi]);
        }
    }
}
