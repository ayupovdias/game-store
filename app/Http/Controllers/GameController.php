<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games=Game::all();
        return view("games.index", compact("games"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("games.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title'=>['required','max:255'],
            'description'=>['required'],
            'genres'=>['required', 'max:255'],
            'price'=>['required', 'numeric'],
         ]);
         Game::create([
             'title'=>$request->input('title'),
             'description'=>$request->input('description'),
             'genres'=>$request->input('genres'),
             'price'=>$request->input('price'),
         ]);

         return redirect()->route("games.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
       return view("games.show", compact("game"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view("games.edit", compact("game"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Game $game)
    {
        $request->validate([
           "title"=>"required|min:5|max:255",
            "description"=>"required|min:5",
            "genres"=>"required|min:3|max:255",
            "price"=>"required|numeric"
        ]);
        $game->update([
            "title"=>$request->input("title"),
            "description"=>$request->input("description"),
            "genres"=>$request->input("genres"),
            "price"=>$request->input("price")
        ]);
        return redirect(route('games.show',$game));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect(route('games.index'));
    }
}
