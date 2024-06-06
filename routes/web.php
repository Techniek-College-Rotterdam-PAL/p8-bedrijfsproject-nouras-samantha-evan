<?php

use Illuminate\Support\Facades\Route;
use App\Models\Player;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('laravelTest');
});

Route::get("/player/index", function () {
    $players = Player::all();
    //dump data DD Dubble D of DUMP & die
    // dd($players) 
    return view('player/index', compact("players"));   
});

Route::get("player/create", function () {
    $players = Player::all();

    return view('player/create', compact("players"));   
});

