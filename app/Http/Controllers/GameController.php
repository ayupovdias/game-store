<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;
use App\Models\Genre;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();
        return view("games.index", compact("games"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view("games.create")->with("genres", $genres);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'genre_id' => ['integer']
        ]);
        if ($request->hasFile("image")) {
            $path = $request->file('image')->store('images/games', 'public');
            $validatedData['image'] = $path;
        }
        Game::create($validatedData);
        return redirect()->route("games.index")->with("created", "The game was created successfully");
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
        $genres = Genre::all();
        return view("games.edit", compact("game", "genres"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'genre_id' => ['integer']
        ]);
        if ($request->hasFile("image")) {
            $path = $request->file('image')->store('images/games', 'public');
            $validatedData['image'] = $path;
        }
        $game->update($validatedData);
        return redirect(route('games.show', $game))->with("updated", "The game was edited successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect(route('games.index'))->with("deleted", "The game was deleted successfully");
    }
}
