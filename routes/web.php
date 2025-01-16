<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// GET route to show the home page.
Route::get('/', [AuthController::class, 'home'])->name('home');

// GET route to show the login form.
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('get.login');

// POST route to login a User.
Route::post('/login', [AuthController::class, 'login'])->name('post.login')->middleware('auth:sanctum');

// GET route to show the register form.
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('get.register');

// POST route to register a new User.
Route::post('/register', [AuthController::class, 'register'])->name('post.register');
