<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/packages', [DashboardController::class, 'packages'])->name('packages');
    Route::get('/groups', [DashboardController::class, 'groups'])->name('groups');
    Route::get('/bookings', [DashboardController::class, 'bookings'])->name('bookings');
    Route::get('/agencies', [DashboardController::class, 'agencies'])->name('agencies');
    Route::get('/customers', [DashboardController::class, 'customers'])->name('customers');
    Route::get('/payments', [DashboardController::class, 'payments'])->name('payments');
});
