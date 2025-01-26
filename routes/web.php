<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
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

    // GET route to show all Surveys form.
    Route::get('all-surveys', 'allSurveysForm')->name('all.surveys');


    // POST route to create a unique survey title and store ObjectId with the User.
    //Route::post('survey-title', 'storeSurveyTitle')->name('post.surveyTitle');

    // POST route to create a Survey.
    Route::post('survey', 'storeSurvey')->name('post.survey');


});

// All routes from QuestionController.
Route::controller(QuestionController::class)->middleware('auth')->group(function () {

    // GET route to show the Questions form.
    Route::get('question', 'questionForm')->name('get.question');

    // POST route to create an open choice Question.
    Route::post('open-question', 'storeOpenQuestion')->name('post.openQuestion');

    // POST route to create a multiple choices Question.
    Route::post('multiple-question', 'storeMultipleQuestion')->name('post.multipleQuestion');

    // POST route to create a multiple choices with one good answer Question.
    Route::post('unique-question', 'storeUniqueQuestion')->name('post.uniqueQuestion');
});


