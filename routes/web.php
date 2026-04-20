<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', function () {
     return redirect()->route('games.index');
})->name('home');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/statistics', function () {
    return view('statistics');
})->name('statistics');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/login', function () {
    $admin = "dias";
    $password = "password";
    if (request('login') == $admin && request('password') == $password) {
        return view('success');
    } else {
        return view('unsuccess');
    }
})->name("login.post");

Route::get("/user/{id}/{name?}", function($id, $name="Dias"){
    return "Your id is $id and your name is $name";
})->name("userData")->where(['id'=>'[0-9]+','name'=>'[a-zA-Z]+']);

Route::resource("games", GameController::class);
