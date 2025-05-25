<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'admin',
            'user-admin',
            'guest',
        ];

        $permissions = [
            'view-users',
            'create-users',
            'update-users',
            'delete-users',
            'view-roles',
            'create-roles',
            'update-roles',
            'delete-roles',
            'view-permissions',
            'create-permissions',
            'update-permissions',
            'delete-permissions',
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }

        $userAdmin = Role::where('name', 'user-admin')->first();

        $userAdmin->permissions()->attach(Permission::where('name', 'view-users')->first());
    }
}
