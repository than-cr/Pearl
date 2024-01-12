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
            'name' => 'Red',
            'code' => '#FF0000'
        ]);
        DB::table('colors')->insert([
            'name' => 'Orange',
            'code' => '#Ffa500'
        ]);
        DB::table('colors')->insert([
            'name' => 'Yellow',
            'code' => '#FFFF00'
        ]);
        DB::table('colors')->insert([
            'name' => 'Green',
            'code' => '#00FF00'
        ]);
        DB::table('colors')->insert([
            'name' => 'Blue',
            'code' => '#0000FF'
        ]);
        DB::table('colors')->insert([
            'name' => 'Purple',
            'code' => '#800080'
        ]);
        DB::table('colors')->insert([
            'name' => 'Pink',
            'code' => '#ffc0cb'
        ]);
        DB::table('colors')->insert([
            'name' => 'Brown',
            'code' => '#964B00'
        ]);
        DB::table('colors')->insert([
            'name' => 'Black',
            'code' => '#000000'
        ]);
        DB::table('colors')->insert([
            'name' => 'Gray',
            'code' => '#808080'
        ]);
        DB::table('colors')->insert([
            'name' => 'White',
            'code' => '#ffffff'
        ]);
    }
}
