<?php

namespace Database\Seeders\Scode;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class ScodeStackerComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::dropIfExists('scode_stacker_components');

        Schema::create('scode_stacker_components', function (Blueprint $table) {
            $table->id();
            $table->string('component');
            $table->string('name');
            $table->string('location');
        });

        $data = [
                    [
                        "component" => "D",
                        "name" => "Постійні магніти (3 шт.) — без датчиків",
                        "location" => "Знаходяться на клампі"
                    ],
                    [
                        "component" => "DPS 2",
                        "name" => "Зчитування позиції колеса відсіку збору",
                        "location" => "Вхід на колесо відсіку збору"
                    ],
                    [
                        "component" => "DPS 4",
                        "name" => "Сигналізатор: Позиція ретракт-відсіку",
                        "location" => "Реджект/ретракт кассета"
                    ],
                    [
                        "component" => "DPS 5",
                        "name" => "Сигналізатор: Початкове положення",
                        "location" => "Стрілочний привід, зліва"
                    ],
                    [
                        "component" => "DPS 6",
                        "name" => "Сигналізатор: Початкове положення",
                        "location" => "Стрілочний привід, справа"
                    ],
                    [
                        "component" => "DPS 7",
                        "name" => "Початкове положення поверхні ковзання",
                        "location" => "Вузол відбраковки"
                    ],
                    [
                        "component" => "DPS 8",
                        "name" => "Сигналізатор: Позиція",
                        "location" => "Стрілочний привід, зліва"
                    ],
                    [
                        "component" => "DPS 9",
                        "name" => "Сигналізатор: Позиція",
                        "location" => "Стрілочний привід, справа"
                    ],
                    [
                        "component" => "DPS 10",
                        "name" => "Вилкоподібний оптичний датчик",
                        "location" => "Шатер"
                    ],
                    [
                        "component" => "DPS 11",
                        "name" => "Вилкоподібний оптичний датчик",
                        "location" => "Шатер"
                    ],
                    [
                        "component" => "DPS 14",
                        "name" => "Початкове положення стрілки",
                        "location" => "Вузол відбраковки"
                    ],
                    [
                        "component" => "DPS 15",
                        "name" => "Позиція стрілки: Вузол відбраковки",
                        "location" => "Вузол відбраковки"
                    ],
                    [
                        "component" => "HS 1",
                        "name" => "Початкове положення (датчик Холла)",
                        "location" => "Позиціонування захвата"
                    ],
                    [
                        "component" => "HS 2",
                        "name" => "Початкова реджект-ретракт позиція (за стрілкою приводу) (датчик Холла)",
                        "location" => "Позиціонування захвата"
                    ],
                    [
                        "component" => "HS 3",
                        "name" => "Позиція реверсу у напрямку переднього завантаження (за необхідності) (датчик Холла)",
                        "location" => "Позиціонування захвата"
                    ]
        ];
        
            DB::table('scode_stacker_components')->insert($data);
    }
}