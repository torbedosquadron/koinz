<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books  = [
            [
                "name" => "Introduction to Algorithms ", 
                "pages_num" => 100, 
                "read_pages_num" => 0,
                "read_pages_interval" => '',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Algorithms Unplugged", 
                "pages_num" => 50,
                "read_pages_num" => 0,
                "read_pages_interval" => '',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Grokking Algorithms", 
                "pages_num" => 20,
                "read_pages_num" => 0,
                "read_pages_interval" => '',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Head First Object-Oriented Design and Analysis", 
                "pages_num" => 200,
                "read_pages_num" => 0,
                "read_pages_interval" => '',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Clean Code", 
                "pages_num" => 150,
                "read_pages_num" => 0,
                "read_pages_interval" => '',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Patterns of Enterprise Applications", 
                "pages_num" => 2000,
                "read_pages_num" => 0,
                "read_pages_interval" => '',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Refactoring", 
                "pages_num" => 1000,
                "read_pages_num" => 0,
                "read_pages_interval" => '',
                "created_at" => now(),
                "updated_at" => now()
            ],


        ];

        DB::table('books')->insert($books);
    }
}
