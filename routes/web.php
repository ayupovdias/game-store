<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\GameController as AdminController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\NewsController;
use App\Models\Genre;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/statistics",function(){
    $genres=Genre::all();
    return view("statistics", compact("genres"));
})->name("statistics");

Route::resource("news", NewsController::class);

Route::group(["middleware"=>'auth'], function(){
    Route::resource("games", GameController::class)->except("index", "show");
    Route::resource("comments", CommentController::class);

    Route::group(["middleware"=>"isAdmin", "prefix"=>"admin", "as"=>"admin."],
        function(){
            Route::resource("games",AdminController::class);
            Route::get("games/genre/{genre}",[AdminController::class, 'byGenre'])->name('games.genre.genre');
            Route::resource("comments",AdminCommentController::class);
            Route::get("users", [UserController::class, "index"])->name("users.index");
            Route::put("users/change-role/{user}", [UserController::class, "changeRole"])->name('users.change-role');
            Route::resource("news",AdminNewsController::class);
    });
});


Route::resource('games', GameController::class)->only(["show", "index"]);

Route::get('/games/genre/{genre}', [GameController::class, 'byGenre'])->name("games.genre.genre");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
