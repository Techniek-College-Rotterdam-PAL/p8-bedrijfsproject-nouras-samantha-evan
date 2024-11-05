<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RepairRequestController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('account', function () {
    return view('account');
});

Route::get('/Inloggen', function () {
    return view('auth.login');
});

Route::get('/OverOns', function () { 
    return view('OverOns');
});


Route::get('/faq', function () {
    return view('faq');
})->name('faq');


// Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();

// POST route for logout
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::post('/profile.edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('edit');

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Admin routes
// Route::middleware(['auth','admin'])->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//     Route::get('/repairRequests', [AdminController::class, 'viewRepairRequests'])->name('admin.repairRequests');
//     Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
//     Route::post('/repair-requests/{id}/update', [AdminController::class, 'updateRepairRequestStatus'])->name('admin.updateRequestStatus');
// });

// Repair Request routes
// 1. Route to show the repair request form
// 2. Route to handle the form submission
// 3. Route to successssss <3333

Route::get('/repair-request', [RepairRequestController::class, 'showForm'])->name('repair.request');
Route::post('/repair-request', [RepairRequestController::class, 'submitRequest'])->name('repair.request.submit');
Route::get('/repair-request/success', [RepairRequestController::class, 'success'])->name('repair.request.success');


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/repairRequests', [AdminController::class, 'viewRepairRequests'])->name('admin.repairRequests');
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
    Route::put('/users/{id}/update-role', [AdminController::class, 'updateUserRole'])->name('admin.updateUserRole');
    // Add this route for updating the repair request status
    Route::put('/repairRequests/{id}/update-status', [AdminController::class, 'updateRepairRequestStatus'])->name('admin.updateRepairRequestStatus');
});


