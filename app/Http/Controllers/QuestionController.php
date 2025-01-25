<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;
use MongoDB\BSON\ObjectId;

class QuestionController extends Controller
{
    /**
     * Show the form for creating or editing questions for a survey.
     *
     * @return View
     */
    public function questionForm(): View
    {
//        // Retrieve the _id of the User connected in MongoDB.
//        $mongoUserId = $this->getMongoUserId();
//
//        // Create a ObjectId with the $mongoUserId to using the Eloquent command.
//        $userObjectId = new ObjectId($mongoUserId);
//
//        // Retrieve the Survey with the $userObjectId and the questions empty.
//        $survey = Survey::where('creator', $userObjectId)->whereRaw(['questions' => ['$size' => 0]])->first();
//
//        // Return survey view with $survey.
//        return view('app/survey')->with('survey', $survey);

        // Return questions view.
        return view('app/questions');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a new open choice Question in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeOpenQuestion(Request $request): RedirectResponse
    {
        // Check if input are valid with the method validate() and return an error if failed.
        $title = $request->validate([
            'title' => 'required',
        ]);

        // Create the Question.
        Question::create([
            'title' => $title,
            'type' => 'open',
        ]);

        // Redirect back with successful message.
        return back()->with('message', 'Well played! Your question for the survey is done.');
    }

    /**
     * Store a new multiple choice Question in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeMultipleQuestion(Request $request): RedirectResponse
    {
        // Check if input are valid and unique with the method validate() and return an error if failed.
        $validatedData = $request->validate([
            'title' => 'required',
            'answer' => 'required',
        ]);

        // Collect all answers.
        $allAnswers = $request->input('answer');

        // Collect good answers.
        $goodAnswers = $request->input('checkbox_checked');

        // Create the Question.
        Question::create([
            'title' => $validatedData['title'],
            'type' => 'multiple',
            'answers' => $allAnswers,
            'good_answers' => $goodAnswers,
        ]);

        // Redirect back with successful message.
        return back()->with('message', 'Well played! Your question for the survey is done.');
    }

    // TODO: UNIQUE METHOD
    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
