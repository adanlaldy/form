<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {

    // GET route to show the home page.
    Route::get('/', 'home')->name('home');

    // GET route to show the login form.
        Route::get('login','loginForm')->name('get.login');

    // POST route to log in a User.
        Route::post('login', 'login')->name('post.login');

    // GET route to show the register form.
        Route::get('register', 'registerForm')->name('get.register');

    // POST route to register a new User.
        Route::post('register', 'register')->name('post.register');

    // GET route to log out a User.
        Route::get('logout', 'logout')->name('logout');
});


// GET route to show all surveys form.
Route::get('all-surveys', [SurveyController::class, 'allSurveys'])->name('all.surveys');

// GET route to show the survey form.
Route::get('survey', [SurveyController::class, 'surveyForm'])->name('get.survey');

// POST route to create a unique survey name.
Route::post('survey', [SurveyController::class, 'storeSurveyName'])->name('post.surveyName');
