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
        $users  = [
            [
                "name" => "Mohamed Fathy",
                "email" => "mohamedfathy@gmail.com",
                "password" => bcrypt("123456"), 
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Amer Mohamed",
                "email" => "amermohamed@gmail.com",
                "password" => bcrypt("123456"), 
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Ahmed Hassan",
                "email" => "ahmedhassan@gmail.com",
                "password" => bcrypt("123456"), 
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Osama Manaa",
                "email" => "osamamanaa@gmail.com",
                "password" => bcrypt("123456"), 
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Islam Shaban",
                "email" => "islamshaban@gmail.com",
                "password" => bcrypt("123456"), 
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Mohamed Zaki",
                "email" => "mohamedzaki@gmail.com",
                "password" => bcrypt("123456"), 
                "created_at" => now(),
                "updated_at" => now()
            ]
        ];

        DB::table('users')->insert($users);
    }
}
