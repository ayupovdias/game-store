<?php

use App\Http\Controllers\Auth\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Controllers\GameController;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/statistics",function(){
    return view('statistics')->name('statistics');
});
Route::get("/news", function(){
    return view("news")->name('news');
});

Route::resource('games',GameController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
