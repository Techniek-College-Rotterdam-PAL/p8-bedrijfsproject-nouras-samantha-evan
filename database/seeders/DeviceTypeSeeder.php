<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeviceType;

class DeviceTypeSeeder extends Seeder
{
    public function run()
    {
        DeviceType::create(['name' => 'Phone']);
        DeviceType::create(['name' => 'Laptop']);
    }
}
