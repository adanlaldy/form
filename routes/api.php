<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// POST route to login a User.
Route::post('/login', [UserController::class, 'login'])->name('api.login')->middleware('auth:sanctum');


