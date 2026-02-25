<?php

namespace Database\Seeders\Scode;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class ControllerComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::dropIfExists('scode_controller_components');

        Schema::create('scode_controller_components', function (Blueprint $table) {
            $table->id();
            $table->string('connector');
            $table->string('description');
        });

        $data = [
            [
                "connector" => "X1",
                "description" => "Вимірювальна станція"
            ],
            [
                "connector" => "X2",
                "description" => "Шаттер"
            ],
            [
                "connector" => "X3",
                "description" => "Презентер"
            ],
            [
                "connector" => "X4",
                "description" => "COM (V.24) підключення до PC"
            ],
            [
                "connector" => "X5",
                "description" => "USB підключення до PC"
            ],
            [
                "connector" => "X6",
                "description" => "Датчик відкритих дверей сейфу"
            ],
            [
                "connector" => "X7",
                "description" => "V.24 інтерфейс"
            ],
            [
                "connector" => "X8",
                "description" => "Cпеціальний електронний модуль (контроль висунутого диспенсора)"
            ],
            [
                "connector" => "X9",
                "description" => "24V напруга живлення"
            ],
            [
                "connector" => "X10",
                "description" => "V.24 з'єднання"
            ],
            [
                "connector" => "X11",
                "description" => "Головний мотор стекера M1"
            ],
            [
                "connector" => "X12",
                "description" => "Двигун вузла відбракування"
            ],
            [
                "connector" => "X13",
                "description" => "Двигуни клампа"
            ],
            [
                "connector" => "X14",
                "description" => "Двигун та підйомні магніти стекера / з лівої та правої сторін"
            ],
            [
                "connector" => "X15",
                "description" => "EEPROM стекера"
            ],
            [
                "connector" => "X16",
                "description" => "Датчик Холла стекера"
            ],
            [
                "connector" => "X17",
                "description" => "Фотосенсори Single Reject (вузла відбракування)"
            ],
            [
                "connector" => "X18",
                "description" => "Фотосенсори стекера з лівої сторони"
            ],
            [
                "connector" => "X30",
                "description" => "Підключення V-модуля"
            ],
            [
                "connector" => "X31",
                "description" => "Підключення V-модуля"
            ],
            [
                "connector" => "X32",
                "description" => "Фотосенсори стекера з правої сторони"
            ],
            [
                "connector" => "X33",
                "description" => "Перемикачі положення та розширення"
            ],
            [
                "connector" => "X40",
                "description" => "Джампери"
            ]
        ];
        
        DB::table('scode_controller_components')->insert($data);
    }
}
