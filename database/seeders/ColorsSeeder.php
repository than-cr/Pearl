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
        //
        DB::table('colors')->insert([
            'id' => 1,
            'name' => 'Red',
            'code' => '#FF0000'
        ]);
        DB::table('colors')->insert([
            'id' => 2,
            'name' => 'Orange',
            'code' => '#Ffa500'
        ]);
        DB::table('colors')->insert([
            'id' => 3,
            'name' => 'Yellow',
            'code' => '#FFFF00'
        ]);
        DB::table('colors')->insert([
            'id' => 4,
            'name' => 'Green',
            'code' => '#00FF00'
        ]);
        DB::table('colors')->insert([
            'id' => 5,
            'name' => 'Blue',
            'code' => '#0000FF'
        ]);
        DB::table('colors')->insert([
            'id' => 6,
            'name' => 'Purple',
            'code' => '#800080'
        ]);
        DB::table('colors')->insert([
            'id' => 7,
            'name' => 'Pink',
            'code' => '#ffc0cb'
        ]);
        DB::table('colors')->insert([
            'id' => 8,
            'name' => 'Brown',
            'code' => '#964B00'
        ]);
        DB::table('colors')->insert([
            'id' => 9,
            'name' => 'Black',
            'code' => '#000000'
        ]);
        DB::table('colors')->insert([
            'id' => 10,
            'name' => 'Gray',
            'code' => '#808080'
        ]);
        DB::table('colors')->insert([
            'id' => 11,
            'name' => 'White',
            'code' => '#ffffff'
        ]);
    }
}
