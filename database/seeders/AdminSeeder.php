<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('role_title','Admin')->first();
        $user = User::firstOrNew([
            'name' => 'Administrator',
            'email' => 'admin@admin.example',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'password_unhash' => 'admin',
            'role_id' => $role->id
        ]);
        $user->save();
    }
}
