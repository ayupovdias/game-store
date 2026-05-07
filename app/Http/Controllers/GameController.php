<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres=Genre::all();
        $games=Game::with("genre")->get();
        return view("games.index", compact("games", "genres"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create", Game::class);
        $genres=Genre::all();
        return view("games.create")->with("genres", $genres)->with("created","The game was created successfully");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("create", Game::class);
         $request->validate([
            'title'=>['required','min:3','max:255'],
            'description'=>['required','min:3'],
            'price'=>['required', 'numeric'],
             'genre_id'=>['integer','exists:genres,id'],
             'image'=>['mimes:png,gif,jpeg,jpg,webp']
 ]);
         $fileName="default.png";
         if($request->hasFile("image")){
             $fileName=$request->file("image")->getClientOriginalName();
             $request->file("image")->storeAs("images/games",$fileName, "public");
         }
         Game::create([
             'title'=>$request->input('title'),
             'description'=>$request->input('description'),
             'genre_id'=>$request->input('genre_id'),
             'price'=>$request->input('price'),
             'user_id'=>auth()->id(),
             'image'=>$fileName
         ]);

         return redirect()->route("games.index")->with("created", "The game was created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        $genres=Genre::all();
        $comments=$game->comments()->with("user")->get();
        return view("games.show")->with(["game"=>$game,"comments"=>$comments,"genres"=>$genres]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        $this->authorize("update", $game);
        $genres=Genre::all();
        return view("games.edit")->with(["game"=>$game, "genres"=>$genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $this->authorize("update", $game);
        $request->validate([
           "title"=>"required|min:3|max:255",
           "description"=>"required|min:3",
           "price"=>"required|numeric",
           "genre_id"=>"integer|exists:genres,id",
            "image'=>'mimes:png,gif,jpeg,jpg,webp"
        ]);
        $fileName=$game->image;
        if($request->hasFile("image")){
            $fileName=$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs("images/news", $fileName, "public");
        }
        $game->update([
            "title"=>$request->input("title"),
            "description"=>$request->input("description"),
            "price"=>$request->input("price"),
            "genre_id"=>$request->input("genre_id"),
            "image"=>$fileName,
        ]);
        return redirect()->route("games.show",$game->id)->with("updated","The game was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $this->authorize("delete", $game);
        $game->delete();
        return redirect()->route("games.index")->with("deleted", "The game was deleted successfully");
    }
    public function byGenre(Genre $genre){
        $genres=Genre::all();
        $games=$genre->games;
        return view('games.index', compact("games", "genres"));
    }
}
