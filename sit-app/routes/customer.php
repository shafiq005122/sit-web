<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\DashboardController;

Route::middleware('customer')->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/bookings', [DashboardController::class, 'bookings'])->name('bookings');
    Route::get('/bookings/{reference}', [DashboardController::class, 'bookingDetail'])->name('bookings.show');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
});
