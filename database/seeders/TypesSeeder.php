<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            'id' => 'c5f52906-3e62-42a1-a10d-6b0c84a9f215',
            'name' => 'Active',
            'group' => 'user_status',
            'created_at' => '2023-09-30 20:15:51',
            'updated_at' => '2023-09-30 20:15:51'
        ]);
        DB::table('types')->insert([
            'id' => 'a731179f-5d04-44d5-9a50-10784e2cd2dc',
            'name' => 'Inactive',
            'group' => 'user_status',
            'created_at' => '2023-09-30 20:15:51',
            'updated_at' => '2023-09-30 20:15:51'
        ]);
        DB::table('types')->insert([
            'id' => 'a57060e8-fdfe-4b8c-ace4-59423343d412',
            'name' => 'Blocked',
            'group' => 'user_status',
            'created_at' => '2023-09-30 20:15:51',
            'updated_at' => '2023-09-30 20:15:51'
        ]);
        DB::table('types')->insert([
            'id' => '9e61fabe-ed2d-4ea8-9e79-db56d7055e2a',
            'name' => 'Active',
            'group' => 'product_status',
            'created_at' => '2023-09-30 20:15:51',
            'updated_at' => '2023-09-30 20:15:51'
        ]);
        DB::table('types')->insert([
            'id' => '1c8d1846-aa15-4522-95c3-8b84225a0047',
            'name' => 'Inactive',
            'group' => 'product_status',
            'created_at' => '2023-09-30 20:15:51',
            'updated_at' => '2023-09-30 20:15:51'
        ]);
    }
}
