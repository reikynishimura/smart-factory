<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'Super Admin', 
            'PPC', 
            'Operator',
            'Inspector', 
            'Warehouse', 
            'Monitoring', 
            'Tek & Log', 
            'Pengendalian Produksi', 
            'Perencanaan Produksi', 
            'Menu Master Data', 
            'Teknolgi Produksi', 
            'PPC IMS',
            'PPC IMS +'
        ];

        foreach ($data as $role) {
            Role::firstOrCreate(['name' => $role]);
        }
    }
}
