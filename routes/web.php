<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/login', [LoginController::class, 'create'])->name('login ');
Route::post('/login', [LoginController::class, 'store'])->middleware('throttle:5,1') -> name('login.store');

Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
Route::get('/dashboard', 
function(){
    return view('dashboard');
}
)->middleware('auth')->name('dashboard');