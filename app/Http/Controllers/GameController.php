<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Genre;
class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games=Game::with("genre")->get();
        return view("games.index", compact("games"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres=Genre::all();
        return view("games.create")->with("genres", $genres)->with("created","The game was created successfully");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title'=>['required','min:3','max:255'],
            'description'=>['required','min:3'],
            'price'=>['required', 'numeric'],
             'genre_id'=>['integer','exists:genres,id']
 ]);
         Game::create([
             'title'=>$request->input('title'),
             'description'=>$request->input('description'),
             'genre_id'=>$request->input('genre_id'),
             'price'=>$request->input('price'),
         ]);

         return redirect()->route("games.index")->with("created", "The game was created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view("games.show")->with("game",$game);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        $genres=Genre::all();
        return view("games.edit")->with(["game"=>$game, "genres"=>$genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
           "title"=>"required|min:3|max:255",
           "description"=>"required|min:3",
           "price"=>"required|numeric",
           "genre_id"=>"integer|exists:genres,id"
        ]);
        $game->update([
            "title"=>$request->input("title"),
            "description"=>$request->input("description"),
            "price"=>$request->input("price"),
            "genre_id"=>$request->input("genre_id")
        ]);
        return redirect()->route("games.show",$game->id)->with("updated","The game was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route("games.index")->with("deleted", "The game was deleted successfully");
    }
}
