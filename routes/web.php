<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
//    \Illuminate\Support\Facades\Log::debug("niko test");
    return view('welcome');
});

Auth::routes();
//Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
