<?php

namespace Database\Seeders;

use App\Models\Coordinates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoordinatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coordinates::create([
            'place' => 'Albert Heijn Pottenbakkerstraat',
            'y_coordinate' => '51.496294776621966',
            'x_coordinate' => '3.607406873994155',
            'permission' => '1',
        ]);
        Coordinates::create([
            'place' => 'Kippie Middelburg',
            'y_coordinate' => '51.49867276408378',
            'x_coordinate' => ' 3.615309308415997',
            'permission' => '1',
        ]);
        Coordinates::create([
            'place' => 'HZ University of Applied Sciences',
            'y_coordinate' => '51.49524944479192',
            'x_coordinate' => '3.6096385834426834',
            'permission' => '1',
        ]);
        Coordinates::create([
            'place' => 'Action Middelburg',
            'y_coordinate' => '51.49625136680606',
            'x_coordinate' => '3.6081472752688746',
            'permission' => '0',
        ]);
        Coordinates::create([
            'place' => 'Sakura Sushi Middelburg',
            'y_coordinate' => '51.496525221657464',
            'x_coordinate' => '3.6067096112739874',
            'permission' => '0',
        ]);
        Coordinates::create([
            'place' => 'Eethuis Nazar',
            'y_coordinate' => '51.49421088927795',
            'x_coordinate' => '3.6025236017599753',
            'permission' => '0',
        ]);
        Coordinates::create([
            'place' => 'Expresszo ',
            'y_coordinate' => '51.498445675755114',
            'x_coordinate' => '3.6097410426447247',
            'permission' => '0',
        ]);
    }
}
