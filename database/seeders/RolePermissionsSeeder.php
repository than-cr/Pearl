<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionsSeeder extends Seeder
{
    private array $permissions = [
        'View home',
        'View products',
        'Add product',
        'Edit product',
        'Delete product',
        'View sizes',
        'Add size',
        'Edit size',
        'Delete size',
        'View colors',
        'Add color',
        'Edit color',
        'Delete color',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'Administrator']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        $user = User::find(1);
        $user->assignRole([$role->id]);
    }
}
