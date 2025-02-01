<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SurveyController;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use MongoDB\BSON\ObjectId;

class QuestionController extends Controller
{
    /**
     * Show the form for creating or editing questions for a survey.
     *
     * @param Survey $survey
     * @return View
     */
    public function newQuestionForm(Survey $survey): View
    {

        // Return new question view.
        return view('app/new_question')->with('survey', $survey);
    }

    /**
     * Show the form to see questions for a survey.
     *
     * @param Survey $survey
     * @return View
     */
    public function questionForm(Survey $survey): View
    {

        // Collect questions from current Survey.
        $questions = $survey->getAttributeValue('questions');

        // Return question view.
        return view('app/question', compact('survey', 'questions'));//->with('questions', $questions);
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
        $question = Question::create([
            'title' => $title['title'],
            'type' => 'open',
        ]);

        // Retrieve the ObjectId for the connected User.
        $mongoUserObjectId = SurveyController::getMongoUserObjectId();

        // Collect the Survey created by the User and update the 'questions' field.
        Survey::where('creator', $mongoUserObjectId)
            ->latest('updated_at')->first()
            ->update(['questions' => [
                '_id' => $question->_id,
                'title' => $question->title,
                'type' => $question->type,
            ]]);

        // Collect the Survey updated.
        $survey = Survey::where('creator', $mongoUserObjectId)->latest('updated_at')->first();

        // Redirect back with successful message.
        return to_route('get.question', ['survey' => $survey])->with('message', 'Well played! Your question for the survey is done.');
    }

    /**
     * Store a new multiple choices Question in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeMultipleQuestion(Request $request): RedirectResponse
    {
        // Check if input are valid and unique with the method validate() and return an error if failed.
        $validatedData = $request->validate([
            'multiple_title' => 'required',
            'multiple_answer' => 'required',
        ]);

        // Collect all answers.
        $allAnswers = $request->input('multiple_answer');

        // Collect good answers.
        $goodAnswers = $request->input('checkbox_checked');

        // Create the Question.
        $question = Question::create([
            'title' => $validatedData['multiple_title'],
            'type' => 'multiple',
            'answers' => $allAnswers,
            'good_answers' => $goodAnswers,
        ]);

        // Retrieve the ObjectId for the connected User.
        $mongoUserObjectId = SurveyController::getMongoUserObjectId();

        // Collect the Survey created by the User and update the 'questions' field.
        Survey::where('creator', $mongoUserObjectId)
            ->latest('updated_at')->first()
            ->update(['questions' => [
                '_id' => $question->_id,
                'title' => $question->title,
                'type' => $question->type,
                'answers' => $question->answers,
                'good_answers' => $question->good_answers,
            ]]);

        // Collect the Survey updated.
        $survey = Survey::where('creator', $mongoUserObjectId)->latest('updated_at')->first();

        // Redirect back with successful message.
        return to_route('get.question', ['survey' => $survey])->with('message', 'Well played! Your question for the survey is done.');
    }

    /**
     * Store a new multiple choices with one good answer Question in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeUniqueQuestion(Request $request): RedirectResponse
    {
        // Check if input are valid and unique with the method validate() and return an error if failed.
        $validatedData = $request->validate([
            'unique_title' => 'required',
            'unique_answer' => 'required',
        ]);

        // Collect all answers.
        $allAnswers = $request->input('unique_answer');

        // Collect good answer.
        $goodAnswer = $request->input('radio_checked');

        // Create the Question.
        $question = Question::create([
            'title' => $validatedData['unique_title'],
            'type' => 'unique',
            'answers' => $allAnswers,
            'good_answers' => $goodAnswer,
        ]);

        // Redirect back with successful message.
        return back()->with('message', 'Well played! Your questions for the survey are done.');
    }

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
