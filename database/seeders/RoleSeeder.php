<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create the admin role
        Role::updateOrCreate(
            ['name' => 'admin'],
        );

        // Create user roles
        Role::updateOrCreate(
            ['name' => 'user'],
        );
    }
}
