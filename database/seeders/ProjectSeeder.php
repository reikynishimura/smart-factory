<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            "project_code" => "2100421.2",
            "status_id" => 1,
            "material" => "A15B0220",
            "project_description" => "PPCW",
            'start_date' => Carbon::createFromFormat('m-d-Y', '08-30-2021')->format('Y-m-d'),
            'finish_date' => Carbon::createFromFormat('m-d-Y', '10-29-2021')->format('Y-m-d'),
            "qty" => "1 set",
            "created_at" => now(),
            "updated_at" => now(),
        ]);
    }
}
