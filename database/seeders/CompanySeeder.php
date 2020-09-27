<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'company_name' => 'Ahmad & CO. Sdn. Bhd.',
            'address1' => 'Jalan Kangar-alor Star, Behor Temak',
            'address2' => 'Behor Temak',
            'city' => 'Kangar',
            'postcode' => '01000',
            'state' => 'Perlis'
        ]);

        Company::create([
            'company_name' => 'Papermill Sdn. Bhd.',
            'address1' => '7 Lrg Aminuddin Baki Taman Tun Dr Ismail',
            'address2' => '',
            'city' => 'Kuala Lumpur',
            'postcode' => '60000',
            'state' => 'Wilayah Persekutuan'
        ]);

        Company::create([
            'company_name' => 'Cempaka Lestari Boutique',
            'address1' => '8 Jln Pjs 11/28 Taman Bandar Sunway Petaling Jaya',
            'address2' => '',
            'city' => 'Petaling Jaya',
            'postcode' => '46150',
            'state' => ' Selangor'
        ]);

        Company::create([
            'company_name' => 'Alam Furniture Sdn. Bhd.',
            'address1' => '9 Laluan Tasek Timur 15',
            'address2' => 'Taman Mewah Bercham',
            'city' => 'Ipoh',
            'postcode' => '31400',
            'state' => ' Perak'
        ]);
    }
}
