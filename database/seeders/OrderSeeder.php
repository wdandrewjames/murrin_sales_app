<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'user_id' => 1,
                'customer_id' => 1,
                'amount' => 35000,
                'invoice_number' => '123-121',
                'invoice_date' => date('Y:m:d', strtotime('-1 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 1,
                'amount' => 35000,
                'invoice_number' => '123-122',
                'invoice_date' => date('Y:m:d', strtotime('-2 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 1,
                'amount' => 35000,
                'invoice_number' => '123-123',
                'invoice_date' => date('Y:m:d', strtotime('-3 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 1,
                'amount' => 35000,
                'invoice_number' => '123-124',
                'invoice_date' => date('Y:m:d', strtotime('-4 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 1,
                'amount' => 35000,
                'invoice_number' => '123-125',
                'invoice_date' => date('Y:m:d', strtotime('-5 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 1,
                'amount' => 35000,
                'invoice_number' => '123-126',
                'invoice_date' => date('Y:m:d', strtotime('-6 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 2,
                'amount' => 35000,
                'invoice_number' => '123-121',
                'invoice_date' => date('Y:m:d', strtotime('-1 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 2,
                'amount' => 56000,
                'invoice_number' => '123-122',
                'invoice_date' => date('Y:m:d', strtotime('-2 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 2,
                'amount' => 56000,
                'invoice_number' => '123-123',
                'invoice_date' => date('Y:m:d', strtotime('-3 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 2,
                'amount' => 56000,
                'invoice_number' => '123-124',
                'invoice_date' => date('Y:m:d', strtotime('-4 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 2,
                'amount' => 56000,
                'invoice_number' => '123-125',
                'invoice_date' => date('Y:m:d', strtotime('-5 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 2,
                'amount' => 56000,
                'invoice_number' => '123-126',
                'invoice_date' => date('Y:m:d', strtotime('-6 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 3,
                'amount' => 35000,
                'invoice_number' => '123-121',
                'invoice_date' => date('Y:m:d', strtotime('-1 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 3,
                'amount' => 35000,
                'invoice_number' => '123-122',
                'invoice_date' => date('Y:m:d', strtotime('-2 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 3,
                'amount' => 35000,
                'invoice_number' => '123-123',
                'invoice_date' => date('Y:m:d', strtotime('-3 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 3,
                'amount' => 35000,
                'invoice_number' => '123-124',
                'invoice_date' => date('Y:m:d', strtotime('-4 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 3,
                'amount' => 35000,
                'invoice_number' => '123-125',
                'invoice_date' => date('Y:m:d', strtotime('-5 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 3,
                'amount' => 35000,
                'invoice_number' => '123-126',
                'invoice_date' => date('Y:m:d', strtotime('-6 months')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
