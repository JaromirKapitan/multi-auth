<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// User Routes
Route::get('login', [\App\Http\Controllers\User\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\User\Auth\LoginController::class, 'login']);
Route::get('/user/dashboard', function () {
    return 'User Dashboard';
})->middleware('auth');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    })->middleware('auth:admin');
});
