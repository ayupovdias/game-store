<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=['name'];

    public const ADMIN=1;
    public const DEVELOPER=2;
    public const JOURNALIST=3;
    public const USER=4;

    public function users(){
        return $this->hasMany(User::class);
    }
}
