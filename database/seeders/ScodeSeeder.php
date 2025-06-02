<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class ScodeSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Schema::dropIfExists('scodes');

        // Schema::create('scodes', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('scode');
        //     $table->string('text');
        //     $table->timestamps();
        // });

        $data = [
            ["scode" => "22", "text" => "Несправність або блокування фотодатчика. Фотодатчик несправний або заблокований. Перевірте всі шляхи проходження банкнот на наявність застряглих купюр або сторонніх предметів. Якщо проблема не зникає після очищення, замініть контролер."],
            ["scode" => "23", "text" => "Блокування або поломка диска маршрутизації. Перевірте, чи вільно обертається диск, при необхідності замініть модуль SAT або контролер."],
        ];

        DB::table('scodes')->insert($data);
    }
}
