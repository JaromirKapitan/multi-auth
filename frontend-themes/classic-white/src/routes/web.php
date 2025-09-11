<?php

use Illuminate\Support\Facades\Route;
use ClassicWhite\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('theme.home');
