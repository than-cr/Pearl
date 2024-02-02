<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            [
                'name' => 'Red',
                'code' => '#FF0000'
            ],
            [
                'name' => 'Orange',
                'code' => '#Ffa500'
            ],
            [
                'name' => 'Yellow',
                'code' => '#FFFF00'
            ],
            [
                'name' => 'Green',
                'code' => '#00FF00'
            ],
            [
                'name' => 'Blue',
                'code' => '#0000FF'
            ],
            [
                'name' => 'Purple',
                'code' => '#800080'
            ],
            [
                'name' => 'Pink',
                'code' => '#ffc0cb'
            ],
            [
                'name' => 'Brown',
                'code' => '#964B00'
            ],
            [
                'name' => 'Black',
                'code' => '#000000'
            ],
            [
                'name' => 'Gray',
                'code' => '#808080'
            ],
            [
                'name' => 'White',
                'code' => '#ffffff'
            ]
        ];

        DB::table('colors')->insert($colors);
    }
}
