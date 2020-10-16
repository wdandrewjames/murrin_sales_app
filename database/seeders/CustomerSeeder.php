<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'business_id' => 1,
                'status_id' => 2,
                'active' => true,
                'company_name' => 'Powderham Food Hall',
                'name' => 'John Smith',
                'job_title' => 'Manager',
                'email' => 'john.smith@powderham.co.uk',
                'website' => 'powderham.co.uk',
                'tel' => '01392 876543',
                'tel_alt' => null,
                'street_address' => 'Powderham Food Hall, Kenton',
                'city' => 'Exeter',
                'county' => 'Devon',
                'post_code' => 'EX6 8UI',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'business_id' => 1,
                'status_id' => 3,
                'active' => true,
                'company_name' => 'Chicken Power',
                'name' => 'Frank Butcher',
                'job_title' => 'CEO',
                'email' => 'frank.butcher@chickenpower.co.uk',
                'website' => 'chickenpower.co.uk',
                'tel' => '01392 752634',
                'tel_alt' => null,
                'street_address' => 'Chickenpower Lord, Marsh Barton',
                'city' => 'Exeter',
                'county' => 'Devon',
                'post_code' => 'EX6 8GE',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'business_id' => 1,
                'status_id' => 4,
                'active' => true,
                'company_name' => 'Everton Football Club',
                'name' => 'Philip Nevile',
                'job_title' => 'Manager',
                'email' => 'philip.nevile@evertonfc.co.uk',
                'website' => 'evertonfc.co.uk',
                'tel' => '01392 564735',
                'tel_alt' => null,
                'street_address' => 'Everton FC, Kings St.',
                'city' => 'Everton',
                'county' => 'Liverpool',
                'post_code' => 'LV5 9PL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
