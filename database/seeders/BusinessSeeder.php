<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('businesses')->insert([
            [
                'name' => 'South Devon Chilli Farm',
                'contact_name' => 'Jill Jane',
                'email' => 'jill.jane@southdevonchillifarm.co.uk',
                'tel' => '07123 123456',
                'tel_alt' => '12345 123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hetti Hen',
                'contact_name' => 'Mike Smith',
                'email' => 'mike.smith@hettihen.co.uk',
                'tel' => '07123 467654',
                'tel_alt' => '12345 985654',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Luscombe',
                'contact_name' => 'Harry Potter',
                'email' => 'harry.potter@luscombe.co.uk',
                'tel' => '07123 659284',
                'tel_alt' => '12345 539202',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Langage',
                'contact_name' => 'Billy Bob',
                'email' => 'billy.bob@langage.co.uk',
                'tel' => '07123 875011',
                'tel_alt' => '12345 774536',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chunk Devon',
                'contact_name' => 'Oliver Twist',
                'email' => 'oliver.twist@chunkdevon.co.uk',
                'tel' => '07123 746522',
                'tel_alt' => '12345 554421',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
