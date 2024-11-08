<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RepairRequestController;
use App\Http\Controllers\AppointmentController;



Route::get('/', function () {
    return view('home');
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

Route::middleware('auth')->group(function () {
    Route::get('/home', [ReviewController::class, 'index'])->name('home');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

// Authenticated Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // Dashboard and Main Views
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/repairRequests', [AdminController::class, 'viewRepairRequests'])->name('admin.repairRequests');
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');

    // Device Model Management using a single Blade view
    Route::get('/deviceModels', [AdminController::class, 'viewDeviceModels'])->name('admin.deviceModels'); // Main view for all device models
    Route::post('/deviceModels', [AdminController::class, 'storeDeviceModel'])->name('admin.storeDeviceModel'); // Store device model
    Route::delete('/deviceModels/{id}', [AdminController::class, 'deleteDeviceModel'])->name('admin.deleteDeviceModel'); // Delete device model

    // Update Methods for Users and Repair Requests
    Route::put('/users/{id}/update-role', [AdminController::class, 'updateUserRole'])->name('admin.updateUserRole');
    Route::put('/repairRequests/{id}/update-status', [AdminController::class, 'updateRepairRequestStatus'])->name('admin.updateRepairRequestStatus');

    // Delete Methods for Users and Repair Requests
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::delete('/repair-requests/{id}', [AdminController::class, 'deleteRepairRequest'])->name('admin.deleteRepairRequest');

    // Search route 
    Route::get('/admin/repair-requests', [AdminController::class, 'repairRequests'])->name('admin.repairRequests');
});

// appointment routes
Route::middleware(['auth'])->group(function () {
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::post('/appointments/check', [AppointmentController::class, 'checkAvailability'])->name('appointments.check');
    Route::post('/appointments/book', [AppointmentController::class, 'book'])->name('appointments.book');
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

