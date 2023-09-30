<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'id'=>1,
            'name'=> 'Jonathan',
            'last_name' => 'Castro',
            'email' => 'than.cr@outlook.com',
            'status_id' => 'c5f52906-3e62-42a1-a10d-6b0c84a9f215',
            'password' => '$2y$10$gzok0v0oL.qRBx/O/h/ANOl/DbI8UtlHD7KkEex1K.pQr6XEfd0B.',
            'created_at' => '2023-09-30 20:52:20',
            'updated_at' => '2023-09-30 20:52:20',
        ]);
    }
}
