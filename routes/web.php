<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\GameController as AdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/statistics",function(){
    return view("statistics");
})->name("statistics");
Route::get("/news", function(){
    return view("news");
})->name("news");

Route::group(["middleware"=>"auth"], function(){
    Route::resource("games", GameController::class)->except("index", "show");
    Route::resource("comments", CommentCOntroller::class);

    Route::group(["middleware"=>"isAdmin", "prefix"=>"admin", "as"=>"admin."],
        function(){
            Route::resource("games",AdminController::class);
    });
});


Route::resource('games', GameController::class)->only(["show", "index"]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
