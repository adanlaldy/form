<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// GET route to show the home page.
Route::get('/', [UserController::class, 'home'])->name('home');

// GET route to show the login form.
Route::get('/login', [UserController::class, 'showLoginForm'])->name('get.login');

// POST route to login a User.
Route::post('/login', [UserController::class, 'login'])->name('post.login')->middleware('auth:sanctum');

// GET route to show the register form.
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('get.register');

// POST route to register a new User.
Route::post('/register', [UserController::class, 'register'])->name('post.register');
