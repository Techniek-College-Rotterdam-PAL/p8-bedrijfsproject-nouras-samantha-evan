<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RepairType;

class RepairTypeSeeder extends Seeder
{
    public function run()
    {
        RepairType::create(['name' => 'Screen Replacement']);
        RepairType::create(['name' => 'Battery Replacement']);
        RepairType::create(['name' => 'Keyboard Repair']);
        RepairType::create(['name' => 'Water Damage Repair']);
    }
}
