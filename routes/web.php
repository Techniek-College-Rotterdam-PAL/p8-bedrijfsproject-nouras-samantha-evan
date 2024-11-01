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
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/repair-requests', [AdminController::class, 'viewRepairRequests'])->name('admin.repairRequests');
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
    Route::post('/admin/repair-requests/{id}/update', [AdminController::class, 'updateRepairRequestStatus'])->name('admin.updateRequestStatus');
});

// Repair Request routes
// Route to show the repair request form
Route::get('/repair-request', [RepairRequestController::class, 'showForm'])->name('repair.request');

// Route to handle the form submission
Route::post('/repair-request', [RepairRequestController::class, 'submitRequest'])->name('repair.request.submit');


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/repair-requests', [AdminController::class, 'viewRepairRequests'])->name('admin.repairRequests');
    Route::post('/repair-requests/{id}/update-status', [AdminController::class, 'updateRepairRequestStatus'])->name('admin.repairRequests.updateStatus');
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
});