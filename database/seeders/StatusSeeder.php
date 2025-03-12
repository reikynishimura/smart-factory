<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $statuses = ['Open', 'Release', 'Ready', 'Close'];

        foreach ($statuses as $status) {
            Status::firstOrCreate(['name' => $status]);
        }
    }
}
