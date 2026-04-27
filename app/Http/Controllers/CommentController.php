<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController
{
    public function store(Request $request){
        $request->validate([
            "text"=>"required|min:3",
            "user_id"=>"integer|exists:users,id",
            "game_id"=>"integer|exists:games,id"
        ]);
        $comment=new Comment;
        $comment->text=$request->input("text");
        $comment->game_id=$request->input("game_id");
        $comment->user_id=Auth::id();
        $comment->save();
        return back()->with("created", "A new comment was created successfully");
    }
}
