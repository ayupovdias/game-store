<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions=[
            'create games',
            'edit games',
            'delete games',
            'publish games',
            'manage users',
            'manage roles',
            'view analytics',
            'manage settings',
            'show games'
        ];
        foreach($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }

        $superAdmin=Role::create(['name'=>'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());

        $admin=Role::create([
            'name'=>'admin',
        ]);
        $admin->givePermissionTo([
           'create games',
            'edit games',
            'delete games',
            'publish games',
            'view analytics'
        ]);

        $user=Role::create([
            'name'=>'user',
        ]);
        $user->givePermissionTo([
            'publish games',
            'show games'
        ]);

        $developer=Role::create([
            'name'=>'developer',
        ]);
        $developer->givePermissionTo([
            'create games',
            'edit games',
            'delete games',
            'publish games'
        ]);
    }
}
