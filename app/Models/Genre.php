<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Game;
class Genre extends Model
{
     protected $fillable =["name"];

     public function games(){
         return $this->hasMany(Game::class);
     }
}
