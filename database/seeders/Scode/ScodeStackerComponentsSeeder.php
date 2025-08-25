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
                    ],
                    [
                        "component" => "HS 4",
                        "name" => "Положення зупинки та кінцевe положення клампу (Датчик Холла)",
                        "location" => "Позиціонування клампа"
                    ],
                    [
                        "component" => "PS 1",
                        "name" => "Вхід на колесо відсіку збору",
                        "location" => "Знизу за колесом відсіку збору, два оптичні сенсори"
                    ],
                    [
                        "component" => "PS 2",
                        "name" => "Контроль спорожнення кошика",
                        "location" => "Вузол відбраковування"
                    ],
                    [
                        "component" => "PS 18",
                        "name" => "Моніторинг входу/порожнього клампу",
                        "location" => "Посередині колеса відсіку збору й зверху діверт-касети"
                    ],
                    [
                        "component" => "PS 27",
                        "name" => "Оптичний датчик гроші забрано клієнтом / позиціонування клампа",
                        "location" => "Шатер"
                    ],
                    [
                        "component" => "PS 28",
                        "name" => "Контроль заднього краю пачки банкнот в клампі / позиціонування клампа",
                        "location" => "Шатер"
                    ],
                    [
                        "component" => "DCM 1",
                        "name" => "Головний двигун стекера",
                        "location" => "Кошик вузла відбраковування"
                    ],
                    [
                        "component" => "DCM 2",
                        "name" => "Двигун переміщення клампу",
                        "location" => "Кламп"
                    ],
                    [
                        "component" => "DCM 3",
                        "name" => "Двигун обертання ременів клампа",
                        "location" => "Кламп"
                    ],
                    [
                        "component" => "DCM 7",
                        "name" => "Двигун шатера (для вуличних атм)",
                        "location" => "Шатер"
                    ],
                    [
                        "component" => "MA 2/1",
                        "name" => "Керуючий механізм стрілочного приводу вузла відбраковування / соленоїд",
                        "location" => "Вузел відбраковування"
                    ],
                    [
                        "component" => "MA 2/2",
                        "name" => "Керуючий механізм стрілочного приводу вузла відбраковування / соленоїд",
                        "location" => "Вузел відбраковування"
                    ],
                    [
                        "component" => "MA 6",
                        "name" => "Керуючий магніт/соленоїд ретракт-відсіку",
                        "location" => "Реджект-касета"
                    ],
                    [
                        "component" => "SW 1",
                        "name" => "Датчик наявності реджект/ретракт касети",
                        "location" => "Реджект-касета"
                    ],
                    [
                        "component" => "SW 2",
                        "name" => "Захисний роз'єднувач",
                        "location" => "На напрямних руху диспенсора у сейфі, зліва"
                    ],
                    [
                        "component" => "SW 3",
                        "name" => "Перемикач блокування",
                        "location" => "Зверху стекера отвір біля реджект-касети "
                    ],
                    [
                        "component" => "SM 1",
                        "name" => "Притискання поверхні вузла відбраковування",
                        "location" => "Вузел відбраковування"
                    ],
                    [
                        "component" => "SM 2",
                        "name" => "Серводвигун стрілки/роутинг дисків",
                        "location" => "Стрілочний привід зліва"
                    ],
                    [
                        "component" => "SM 3",
                        "name" => "Серводвигун стрілки/роутинг дисків",
                        "location" => "Стрілочний привід справа"
                    ],
                    [
                        "component" => "SM 7",
                        "name" => "Кроковий двигун (для хольних атм)",
                        "location" => "Шатер"
                    ],
                    [
                        "component" => "SM 9",
                        "name" => "Кроковий двигун колеса відсіку збору",
                        "location" => "Колесо відсіку збору"
                    ],
                    [
                        "component" => "T 1",
                        "name" => "Тактове колесо",
                        "location" => "Колесо відсіку збору"
                    ],
                    [
                        "component" => "MACx",
                        "name" => "Утримуючий магніт",
                        "location" => "Модуль відділення банкнот, x - номер касети"
                    ],
                    [
                        "component" => "CLx",
                        "name" => "Механізм виведення банкнот / муфта виведення",
                        "location" => "Модуль відділення банкнот, x - номер касети"
                    ],
                    [
                        "component" => "PSDx",
                        "name" => "Сигналізатор виводу",
                        "location" => "Модуль відділення банкнот, x - номер касети"
                    ],
                    [
                        "component" => "PSEx",
                        "name" => "Сигналізатор спорожнення касети",
                        "location" => "Модуль відділення банкнот, x - номер касети"
                    ],
                    [
                        "component" => "DDU",
                        "name" => "Вимірювальна станція / вимірювання довжини",
                        "location" => "Верхній V-модуль - зверху"
                    ],
                    [
                        "component" => "SMCx",
                        "name" => "Кроковий двигун притиску банкнот",
                        "location" => "У середині касети х"
                    ],
                    [
                        "component" => "PRCx",
                        "name" => "Датчик натиску",
                        "location" => "Модуль відділення банкнот, x - номер касети"
                    ],
                    [
                        "component" => "EEPx",
                        "name" => "EEPROM",
                        "location" => "На касеті х"
                    ],
                    [
                        "component" => "STx",
                        "name" => "Касетний роз'єм",
                        "location" => "На касеті х"
                    ]
        ];
        
            DB::table('scode_stacker_components')->insert($data);
    }
}
