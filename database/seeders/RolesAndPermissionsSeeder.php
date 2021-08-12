<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'list']);
        Permission::create(['name' => 'view']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'publish']);
        Permission::create(['name' => 'unpublish']);
        Permission::create(['name' => 'reports']);
        Permission::create(['name' => 'notifications']);

        $user = Role::create(['name' => 'user'])->givePermissionTo(['list','view']);
        $finance = Role::create(['name' => 'finance'])->givePermissionTo(['list','view','reports']);
        $officer = Role::create(['name' => 'officer'])->givePermissionTo(Permission::all());
        $manager = Role::create(['name' => 'manager'])->givePermissionTo(Permission::all());
        $super_admin = Role::create(['name' => 'super-admin'])->givePermissionTo(Permission::all());
    }
}
