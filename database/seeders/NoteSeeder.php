<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert([
            [
                'user_id' => 1,
                'customer_id' => 1,
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores iste corporis praesentium, recusandae tempora tempore veritatis, repellendus possimus est quisquam molestiae quidem deserunt. Illo maiores veritatis alias magni doloremque commodi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 1,
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores iste corporis praesentium, recusandae tempora tempore veritatis, repellendus possimus est quisquam molestiae quidem deserunt. Illo maiores veritatis alias magni doloremque commodi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 1,
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores iste corporis praesentium, recusandae tempora tempore veritatis, repellendus possimus est quisquam molestiae quidem deserunt. Illo maiores veritatis alias magni doloremque commodi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 1,
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores iste corporis praesentium, recusandae tempora tempore veritatis, repellendus possimus est quisquam molestiae quidem deserunt. Illo maiores veritatis alias magni doloremque commodi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 2,
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores iste corporis praesentium, recusandae tempora tempore veritatis, repellendus possimus est quisquam molestiae quidem deserunt. Illo maiores veritatis alias magni doloremque commodi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 2,
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores iste corporis praesentium, recusandae tempora tempore veritatis, repellendus possimus est quisquam molestiae quidem deserunt. Illo maiores veritatis alias magni doloremque commodi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 2,
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores iste corporis praesentium, recusandae tempora tempore veritatis, repellendus possimus est quisquam molestiae quidem deserunt. Illo maiores veritatis alias magni doloremque commodi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 2,
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores iste corporis praesentium, recusandae tempora tempore veritatis, repellendus possimus est quisquam molestiae quidem deserunt. Illo maiores veritatis alias magni doloremque commodi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 3,
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores iste corporis praesentium, recusandae tempora tempore veritatis, repellendus possimus est quisquam molestiae quidem deserunt. Illo maiores veritatis alias magni doloremque commodi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 3,
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores iste corporis praesentium, recusandae tempora tempore veritatis, repellendus possimus est quisquam molestiae quidem deserunt. Illo maiores veritatis alias magni doloremque commodi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 3,
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores iste corporis praesentium, recusandae tempora tempore veritatis, repellendus possimus est quisquam molestiae quidem deserunt. Illo maiores veritatis alias magni doloremque commodi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'customer_id' => 3,
                'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores iste corporis praesentium, recusandae tempora tempore veritatis, repellendus possimus est quisquam molestiae quidem deserunt. Illo maiores veritatis alias magni doloremque commodi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
