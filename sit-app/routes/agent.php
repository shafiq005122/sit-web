<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agent\DashboardController;

Route::middleware('agent')->prefix('agent')->name('agent.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/packages', [DashboardController::class, 'packages'])->name('packages');
    Route::get('/groups', [DashboardController::class, 'groups'])->name('groups');
    Route::get('/bookings', [DashboardController::class, 'bookings'])->name('bookings');
    Route::get('/wallet', [DashboardController::class, 'wallet'])->name('wallet');
});
