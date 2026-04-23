<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Game extends Model
{
    use HasFactory;

    protected $fillable=['title','description', 'price', 'image', 'genre_id'];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
