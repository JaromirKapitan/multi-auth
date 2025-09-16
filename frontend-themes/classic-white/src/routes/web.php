<?php

use Illuminate\Support\Facades\Route;
use ClassicWhite\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('theme.home');
Route::get('/2', [HomeController::class, 'index2'])->name('theme.home2');
