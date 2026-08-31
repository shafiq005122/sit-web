<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\AgentAuthController;
use App\Http\Controllers\Auth\AdminAuthController;

// Public website
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/packages', [HomeController::class, 'packages'])->name('packages');
Route::get('/packages/{slug}', [HomeController::class, 'packageDetail'])->name('packages.show');
Route::get('/groups', [HomeController::class, 'groups'])->name('groups');
Route::get('/groups/{id}', [HomeController::class, 'groupDetail'])->name('groups.show');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/documents', [HomeController::class, 'documents'])->name('documents');

// Customer auth
Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('/login', [CustomerAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [CustomerAuthController::class, 'login']);
    Route::get('/register', [CustomerAuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [CustomerAuthController::class, 'register']);
    Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('logout');
});

// Agent auth
Route::prefix('agent')->name('agent.')->group(function () {
    Route::get('/login', [AgentAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AgentAuthController::class, 'login']);
    Route::get('/register', [AgentAuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AgentAuthController::class, 'register']);
    Route::post('/logout', [AgentAuthController::class, 'logout'])->name('logout');
});

// Admin auth
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

require __DIR__.'/customer.php';
require __DIR__.'/agent.php';
require __DIR__.'/admin.php';
