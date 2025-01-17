<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

// GET route to show the home page.
Route::get('/', [AuthController::class, 'home'])->name('home');

// GET route to show the login form.
Route::get('/login', [AuthController::class, 'loginForm'])->name('get.login');

// POST route to log in a User.
Route::post('/login', [AuthController::class, 'login'])->name('post.login');

// GET route to show the register form.
Route::get('/register', [AuthController::class, 'registerForm'])->name('get.register');

// POST route to register a new User.
Route::post('/register', [AuthController::class, 'register'])->name('post.register');

// Delete route to log out a User.
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

// GET route to show the all survey form.
Route::get('/all-surveys', [SurveyController::class, 'allSurveys'])->name('all.surveys');
