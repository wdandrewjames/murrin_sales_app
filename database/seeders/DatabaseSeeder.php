<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StatusSeeder::class,
            UserSeeder::class,
            BusinessSeeder::class,
            CustomerSeeder::class,
            NoteSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
