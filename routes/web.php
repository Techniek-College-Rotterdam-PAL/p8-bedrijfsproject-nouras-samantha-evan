<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController; // Ensure you have this import

Route::get('/', function () {
    return view('welcome');
});

// Make sure the view path is correct; use 'auth.login' without the leading slash
Route::get('/Inloggen', function () {
    return view('auth.login');
});

// POST route for logout
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Auth::routes();

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
