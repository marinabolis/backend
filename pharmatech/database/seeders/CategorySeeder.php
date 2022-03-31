<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'cardio'],
            ['name' => 'anti_biotic'],
            ['name' => 'anti_diabetic'],
            ['name' => 'anti_hypertensive'],
            ['name' => 'lungs'],
            ['name' => 'hearts'],
            ['name' => 'legs'],
            ['name' => 'notthing'],
            ['name' => 'ear'],
            ['name' => 'nose'],
        ];

        DB::table('categories')->insert($categories);
    }
}
