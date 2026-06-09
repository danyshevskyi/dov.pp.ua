<?php

namespace Database\Seeders\Analytics;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnalyticsProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "key_projects" => 1,
                "name" => "Miles",
                "url" => "https://miles.pp.ua",
                "key_name" => "miles"
            ],
            [
                "key_projects" => 2,
                "name" => "DOV Analytics",
                "url" => "https://dov.pp.ua/analytics",
                "key_name" => "analytics"
            ],
            [
                "key_projects" => 3,
                "name" => "Dov Software",
                "url" => "https://dov.pp.ua",
                "key_name" => "index"
            ],
            [
                "key_projects" => 4,
                "name" => "English Cards",
                "url" => "https://dov.pp.ua/english-cards",
                "key_name" => "cards"
            ],
            [
                "key_projects" => 5,
                "name" => "Scode",
                "url" => "https://scode.pp.ua",
                "key_name" => "scode"
            ]
        ];

        DB::table('analytics_projects')->insert($data);
    }
}
