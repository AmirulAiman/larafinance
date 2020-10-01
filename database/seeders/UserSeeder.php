<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('role_title','Company')->first();

        $company1 = Company::find(1);
        $company2 = Company::find(2);
        $company3 = Company::find(3);
        $company4 = Company::find(4);

        $company1->users()->create([
            'name' => 'Ahmad Badrul Bin Tajuddin',
            'username' => 'ahmad_badrul',
            'email' => 'ahmad_badrul@example.com',
            'password' => Hash::make('124567890'),
            'password_unhash' => '1234567890',
            'role_id' => $role->id
        ]);

        $company2->users()->create([
            'name' => 'Amni Nasuha Bt. Badrul',
            'username' => 'amni_nasuha',
            'email' => 'amni_nasuha@example.com',
            'password' => Hash::make('124567890'),
            'password_unhash' => '1234567890',
            'role_id' => $role->id
        ]);

        $company3->users()->create([
            'name' => 'Farah bt. Burhan',
            'username' => 'farah_burhan',
            'email' => 'farah_burhan@example.com',
            'password' => Hash::make('124567890'),
            'password_unhash' => '1234567890',
            'role_id' => $role->id
        ]);

        $company4->users()->create([
            'name' => 'Alex Tan',
            'username' => 'alex_tan',
            'email' => 'alex_tan@example.com',
            'password' => Hash::make('124567890'),
            'password_unhash' => '1234567890',
            'role_id' => $role->id
        ]);
    }
}
