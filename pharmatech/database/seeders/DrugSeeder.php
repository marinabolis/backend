<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DrugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drugs = [
            ['trade_name_ar' => 'jacket',
            'trade_name_en' => 'ferrotron',
            'image' => '1.jpg',
            'description' =>Str::random(10),
            'price' => 100,
           
            'category_id' => 1,
           
        ],
            ['trade_name_ar' => 't-shirt',
            'trade_name_en' => 'feotron',
            'image' => '1.jpg',
            'description' => '1.jpg',
            'price' => 120,
            
            'category_id' => 2,
          
        ],
            ['trade_name_ar' => 'hat',
            'trade_name_en' => 'tron',
            'image' => '2.jpg',
            'description' =>Str::random(10),
            'price' => 100,
           
            'category_id' => 3,
           
        ],
            ['trade_name_ar' => 'trendi',
            'trade_name_en' => 'ferroton',
            'image' => '2.jpg',
            'description' =>Str::random(10),
            'price' => 150,
           
            'category_id' => 4,
            
        ],
            ['trade_name_ar' => 'elegent',
            'trade_name_en' => 'frrotron',
            'image' =>'2.jpg',
            'description' =>Str::random(10),
            'price' => 200,
           
            'category_id' => 5,
           
        ]];
        DB::table('drugs')->insert($drugs);
    }
}
