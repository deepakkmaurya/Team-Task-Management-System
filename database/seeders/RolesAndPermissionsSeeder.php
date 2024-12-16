<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        Permission::create(['name' => 'manage teams']);
        Permission::create(['name' => 'manage tasks']);
        Permission::create(['name' => 'assign tasks to users']);
        Permission::create(['name' => 'update task attributes']);

        // Create roles and assign permissions
        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo(['manage teams', 'manage tasks', 'assign tasks to users', 'update task attributes']);

        $manager = Role::create(['name' => 'Manager']);
        $manager->givePermissionTo(['manage tasks', 'assign tasks to users', 'update task attributes']);

        $member = Role::create(['name' => 'Member']);
        $member->givePermissionTo(['update task attributes']);
    }
}
