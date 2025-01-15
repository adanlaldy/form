<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// GET route to show the home page.
Route::get('/', [UserController::class, 'home'])->name('home');

// GET route to show the login form.
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');


// GET route to show the register form.
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');

// POST route to register a new User.
Route::post('/register', [UserController::class, 'register'])->name('register');
