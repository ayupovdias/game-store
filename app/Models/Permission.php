<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

Permission::create(['name'=>'create games']);
Permission::create(['name'=>'edit games']);
Permission::create(['name'=>'delete games']);
Permission::create(['name'=>'publish games']);
Permission::create(['name'=>'show games']);
Permission::create(['name'=>'manage users']);
Permission::create(['name'=>'manage roles']);
Permission::create(['name'=>'view analytics']);
