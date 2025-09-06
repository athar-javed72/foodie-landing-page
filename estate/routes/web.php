<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

// Home Page
Route::get('/', [AuthController::class, 'home'])->name('home');
// Auth pages (just showing views)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
// Properties page
Route::get('/properties', [AuthController::class, 'properties'])->name('properties');
// Contact page
Route::get('/contact', [AuthController::class, 'contact'])->name('contact');

