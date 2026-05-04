<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Comment;
class Game extends Model
{
    use HasFactory;
    protected $fillable=['title','description', 'price','genre_id', 'user_id'];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
