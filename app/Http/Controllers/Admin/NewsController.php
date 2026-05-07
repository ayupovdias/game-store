<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\News;
class NewsController extends Controller
{
    public function index(){
        $genres=Genre::all();
        $news=News::with("user")->get();
        return view("admin.news.index",compact("genres", "news"));
    }
    public function destroy(News $news){
        $news->delete();
        return redirect(route('admin.news.index'))->with("deleted", "The comment was deleted successfully by an admin");
    }
}
