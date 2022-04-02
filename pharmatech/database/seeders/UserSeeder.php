<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
            'name' => 'Mirette',
           
            'email' => 'miretteFayz@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'alex',
            'street' => 'khattab',
            
            'role' => 'admin',

        ],
        [
            'name' => 'Marina',
         
            'email' => 'MarinaBolis@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'cairo',
            'street' => 'shekolany',
            
            'role' => 'admin',
        ],
        [
            'name' => 'Yossef',
         
            'email' => 'yossef@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'alex',
            'street' => 'ezz',
            
            'role' => 'admin',
        ],
        [
            'name' => 'Esraa',
           
            'email' => 'esraa@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'fayoom',
            'street' => 'asfra',
            
            'role' => 'admin',
        ],
        [
            'name' => 'Jim',
        
            'email' => 'jim@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'new york',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'Will',
           
            'email' => 'Will@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'florida',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'Jason',
           
            'email' => 'jason@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'london',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'Dawyn',
           
            'email' => 'dawyn@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'boston',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'Tom',
           
            'email' => 'tom@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'annie',
           
            'email' => 'annie@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'Tommie',
           
            'email' => 'tommie@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'messi',
           
            'email' => 'messi@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'kaka',
           
            'email' => 'kaka@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'ronaldo',
           
            'email' => 'ronaldo@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'nymar',
           
            'email' => 'nymar@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'mosala',
           
            'email' => 'mosala@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'hazard',
           
            'email' => 'hazard@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'alex',
           
            'email' => 'alex@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'henry',
           
            'email' => 'henry@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'pogaba',
           
            'email' => 'pogaba@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'ronaldinho',
           
            'email' => 'ronaldinho@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'robinho',
           
            'email' => 'robinho@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'drogba',
           
            'email' => 'drogba@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'mounir',
           
            'email' => 'mounir@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'diab',
           
            'email' => 'diab@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'tomas',
           
            'email' => 'tomas@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'hamaki',
           
            'email' => 'hamaki@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'hamoksha',
           
            'email' => 'hamoksha@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        [
            'name' => 'john',
           
            'email' => 'john@gmail.com',
            'password' => bcrypt('123456'),
            'city' => 'califorina',
            'street' => 'khattab',
            
            'role' => 'user',
        ],
        ];

        DB::table('users')->insert($users);
    }
}
