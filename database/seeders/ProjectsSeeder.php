<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "id" => 1,
                "name" => "Miles",
                "url" => "https://dov.pp.ua/miles",
                "key_name" => "miles"
            ],
            [
                "id" => 2,
                "name" => "Analytics",
                "url" => "https://dov.pp.ua/analytics",
                "key_name" => "analytics"
            ],
            [
                "id" => 3,
                "name" => "Dov Software",
                "url" => "https://dov.pp.ua",
                "key_name" => "index"
            ],
            [
                "id" => 4,
                "name" => "English Cards",
                "url" => "https://dov.pp.ua/english-cards",
                "key_name" => "cards"
            ],
            [
                "id" => 5,
                "name" => "Scode",
                "url" => "https://dov.pp.ua/scode",
                "key_name" => "scode"
            ]
        ];

        DB::table('projects')->insert($data);
    }
}
