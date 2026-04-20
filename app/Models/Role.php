<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

$adminRole=Role::create(['name'=>'admin']);
$userRole=Role::create(['name'=>'user']);
$developerRole=Role::create(['name'=>'developer']);

$adminRole->GivePermissionTo(Permission::all());

$userRole->GivePermissionTo([
    'publish games'
]);

$developerRole->GivePermissionTo([
    'create games',
    'edit games',
    'delete games',
    'publish games'
]);

