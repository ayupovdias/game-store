<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
class Game extends Model
{
    protected $fillable=['title','description', 'price', 'image', 'genre_id'];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
