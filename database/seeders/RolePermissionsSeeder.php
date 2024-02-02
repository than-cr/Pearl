<?php

namespace Database\Seeders;

use App\Models\User;
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
        'View categories',
        'Add category',
        'Edit category',
        'Delete category'
    ];

    private array $sellerPermissions = [
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
        'View categories',
        'Add category',
        'Edit category',
        'Delete category'
    ];

    private array $buyerPermissions = [
        'View home',
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

        $role = Role::create(['name' => 'Seller']);
        $permissions = Permission::whereIn('name', $this->sellerPermissions)->get();
        $role->syncPermissions($permissions);

        $role = Role::create(['name' => 'Buyer']);
        $permissions = Permission::whereIn('name', $this->buyerPermissions)->get();
        $role->syncPermissions($permissions);
    }
}
