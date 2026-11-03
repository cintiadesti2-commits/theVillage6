<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.process');

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

// Contoh proteksi halaman berdasarkan role
Route::middleware(['auth', 'role:ADMIN'])->get('/admin', function () {
    return 'Halaman Admin';
});

Route::middleware(['auth', 'role:PENYELENGGARA'])->get('/penyelenggara', function () {
    return 'Halaman Penyelenggara';
});

Route::middleware(['auth', 'role:USER'])->get('/warga', function () {
    return 'Halaman Warga';
});