<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            [
                'name' => 'No Status',
                'description' => 'The customer has no status',
                'color' => 'grey',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'No Interest',
                'description' => 'The customer has been contacted, but has no interest in buying any products',
                'color' => 'red',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Current Customer',
                'description' => 'The customer has previously created an order',
                'color' => 'green',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Prospect',
                'description' => 'The customer has been contacted and is interested in making a purchase',
                'color' => 'yellow',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Third Party Buyer',
                'description' => 'The customer is currently buying this businesses products through other suppliers',
                'color' => 'purple',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
