<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeviceModel;

class DeviceModelSeeder extends Seeder
{
    public function run()
    {
        // Assuming '1' is the ID for 'Phone' and '2' is for 'Laptop' from DeviceTypeSeeder
        DeviceModel::create(['name' => 'iPhone 13', 'type_id' => 1]);
        DeviceModel::create(['name' => 'Samsung Galaxy S21', 'type_id' => 1]);
        DeviceModel::create(['name' => 'Dell XPS 15', 'type_id' => 2]);
        DeviceModel::create(['name' => 'MacBook Pro 16"', 'type_id' => 2]);
    }
}