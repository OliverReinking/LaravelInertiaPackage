<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return Inertia::render('Homepage/Views/Home');
})->name('home');


Route::middleware(['auth'])->group(function () {
    // ---------------------
    // The Applicationswitch
    // ---------------------
    Route::get('/applicationswitch', [ApplicationController::class, 'index'])->name('applicationswitch');
    // -----------------
    // Application Admin
    // -----------------
    Route::middleware(['is_admin'])->group(function () {
        // Dashboard
        Route::get('/admin/dashboard/{name?}', [AdminDashboardController::class, 'admin_index'])->name('admin.dashboard');
    });
    // --------------------
    // Application Customer
    // --------------------
    // Dashboard
    Route::get('/customer/dashboard/{name?}', [CustomerDashboardController::class, 'customer_index'])->name('customer.dashboard');
});
