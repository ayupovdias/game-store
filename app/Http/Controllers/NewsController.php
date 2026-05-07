<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Genre;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news=News::with('user')->get();
        $genres=Genre::all();
        return view('news.index')->with(["news"=>$news, "genres"=>$genres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create",News::class);
        return view("news.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("create", News::class);
        $request->validate([
            "title"=>"required|min:3|max:255",
            "content"=>"required|min:3",
            "image"=>"mimes:png,jpeg,jpg,webp,gif"
        ]);
        $fileName="default.jpg";
        if($request->hasFile("image")){
            $fileName=$request->file("image")->getClientOriginalName();
            $request->file("image")->storeAs("images/news",$fileName, "public");
        }
        News::create([
            "title"=>$request->input("title"),
            "content"=>$request->input("content"),
            "image"=>$fileName,
            "user_id"=>auth()->id(),
        ]);
        return redirect(route('news.index'))->with("created", "The news was added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $genres=Genre::all();
        return view("news.show", compact("news", "genres"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $this->authorize("update",$news);
        return view("news.edit", compact("news"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $this->authorize("update",$news);
        $request->validate([
            "title"=>"required|min:3|max:255",
            "content"=>"required|min:3",
            "image"=>"mimes:png,jpeg,jpg,webp,gif"
        ]);
        $fileName=$news->image;
        if($request->hasFile("image")){
            $fileName=$request->file("image")->getClientOriginalName();
            $request->file("image")->storeAs("images/news", $fileName, "public");
        }
        $news->update([
            "title"=>$request->input("title"),
            "content"=>$request->input("content"),
            "image"=>$fileName,
        ]);
        return redirect(route('news.show', $news->id))->with("updated","The news were updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $this->authorize("delete", $news);
        $news->delete();
        return redirect(route("news.index"))->with("deleted", "The news were deleted successfully");
    }
}
