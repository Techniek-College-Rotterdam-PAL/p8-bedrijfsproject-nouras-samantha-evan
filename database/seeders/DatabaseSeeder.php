<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            DeviceTypeSeeder::class,
            RepairTypeSeeder::class,
            DeviceModelSeeder::class,
        ]);
    }
}
