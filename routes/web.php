<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RepairController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('account', function () {
    return view('account');
});

Route::get('/Inloggen', function () {
    return view('auth.login');
});

// Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// POST route for logout
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::post('/profile.edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('edit');

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Form routes (now accessible to everyone)
Route::get('/phone-repair', [RepairController::class, 'showPhoneRepairForm'])->name('phone.repair');
Route::post('/phone-repair', [RepairController::class, 'submitPhoneRepair'])->name('phoneRepair.submit');

Route::get('/laptop-repair', [RepairController::class, 'showLaptopRepairForm'])->name('laptop.repair');
Route::post('/laptop-repair', [RepairController::class, 'submitLaptopRepair'])->name('laptopRepair.submit');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
