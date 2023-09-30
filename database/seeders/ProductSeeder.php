<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            'id'=>'1c2391d1-9e39-44a7-945e-8fe4847a9524',
            'name'=> 'Dress',
            'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit ve',
            'price' => 15,
            'qualification' => 3,
            'reviewers_counter' => 3,
            'image_url' => 'assets/img/products/mock-products/dress.png',
            'stock_quantity' => 3,
            'size' => 'Unique',
            'user_id' => 1,
            'status_id' => '9e61fabe-ed2d-4ea8-9e79-db56d7055e2a',
            'created_at' => '2023-09-30 20:52:20',
            'updated_at' => '2023-09-30 20:52:20',
        ]);
        DB::table('products')->insert([
            'id'=>'1c2391e1-9e39-44a7-945e-8fe4847a1234',
            'name'=> 'Worm',
            'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit ve',
            'price' => 10,
            'qualification' => 5,
            'reviewers_counter' => 10,
            'image_url' => 'assets/img/products/mock-products/worm.png',
            'stock_quantity' => 0,
            'size' => 'Unique',
            'user_id' => 1,
            'status_id' => '9e61fabe-ed2d-4ea8-9e79-db56d7055e2a',
            'created_at' => '2023-09-30 20:52:20',
            'updated_at' => '2023-09-30 20:52:20',
        ]);
        DB::table('products')->insert([
            'id'=>'1c2343r5-9e39-44a7-945e-8fe4847a1234',
            'name'=> 'Handcrafted vessel',
            'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit ve',
            'price' => 5,
            'qualification' => 4,
            'reviewers_counter' => 15,
            'image_url' => 'assets/img/products/mock-products/vessel.png',
            'stock_quantity' => 0,
            'size' => 'Unique',
            'user_id' => 1,
            'status_id' => '9e61fabe-ed2d-4ea8-9e79-db56d7055e2a',
            'created_at' => '2023-09-30 20:52:20',
            'updated_at' => '2023-09-30 20:52:20',
        ]);
    }
}
