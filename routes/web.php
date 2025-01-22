<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

// All routes from AuthController.
Route::controller(AuthController::class)->group(function () {

    // Middleware to access to these routes if we are not connected.
    Route::middleware('guest')->group(function () {

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
    });

    // GET route to log out a User.
    Route::get('logout', 'logout')->name('logout')->middleware('auth');
});

// All routes from SurveyController.
Route::controller(SurveyController::class)->middleware('auth')->group(function () {

    // GET route to show all surveys form.
    Route::get('all-surveys', 'allSurveysForm')->name('all.surveys');

    // GET route to show the survey form.
    Route::get('survey', 'surveyForm')->name('get.survey');

    // POST route to create a unique survey name and store ObjectId with the User.
    Route::post('survey-name', 'storeSurveyName')->name('post.surveyName');

    // POST route to create a survey.
    Route::post('survey', 'storeSurvey')->name('post.survey');
});

