<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate([
            'role_title' => 'Admin'
        ]);

        Role::firstOrCreate([
           'role_title' => 'Company'
        ]);

        Role::firstOrCreate([
            'role_title' => 'Customer'
        ]);
    }
}
