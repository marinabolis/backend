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
            ['name' => 'anti-biotics'],
            ['name' => 'anti-hypertensive'],
            ['name' => 'anti-diabetic'],
            ['name' => 'skin care '],
            ['name' => 'cardio_drug']
        ];

        DB::table('categories')->insert($categories);
    }
}
