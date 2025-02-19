<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SurveyController;
use App\Models\Question;
use App\Models\Response;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use MongoDB\BSON\ObjectId;

class QuestionController extends Controller
{
    /**
     * Get the MongoDB User id.
     *
     * @return string
     */
    public static function getMongoUserObjectId(): string
    {
        // Retrieve the currently authenticated User.
        $user = Auth::user();

        // Retrieve the User from MongoDB.
        $mongoUser = User::where('email', $user->email)->first();

        // Return the ObjecId of the connected User.
        return new ObjectId($mongoUser->_id);
    }

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

        // Collect answers from current Survey.
        $response = Response::where('survey_id', $survey->_id)->first();
        $userId = $response->getAttributeValue('user_id');
        $user = User::where('_id', $userId)->first();
        $answers = $response->getAttributeValue('answers');

        // Return question view.
        return view('app/question', compact('survey', 'questions', 'answers', 'user'));
    }

    /**
     * Store a new open choice Question in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeOpenQuestion(Request $request): RedirectResponse
    {
        // Check if input are valid and unique with the method validate() and return an error if failed.
        $validatedData = $request->validate([
            'title' => 'required',
        ]);


        // Retrieve the ObjectId for the connected User.
        $mongoUserObjectId = SurveyController::getMongoUserObjectId();

        $survey = Survey::where('creator', $mongoUserObjectId)
            ->latest('updated_at')->first();

        $existingQuestions = [];

        if (is_object($existingQuestions)) {
            $existingQuestions = [$existingQuestions];
        }

        $question = Question::create([
            'title' => $validatedData['title'],
            'type' => 'open',
        ]);

        $existingQuestions[] = [
            '_id' => $question->_id,
            'title' => $question->title,
            'type' => $question->type,
        ];

        foreach ($request->input('open_title') as $title) {

            $question = Question::create([
                'title' => $title,
                'type' => 'open',
            ]);

            $existingQuestions[] = [
                '_id' => $question->_id,
                'title' => $question->title,
                'type' => $question->type,
            ];
        }

        $survey->update(['questions' => $existingQuestions]);
        // Collect the Survey updated.
        //$survey = Survey::where('creator', $mongoUserObjectId)->latest('updated_at')->first();

        // Retrieve the User from MongoDB.
        $userObjectId = $this->getMongoUserObjectId();

        // Collect questions from current Survey.
        //$questions = $survey->getAttributeValue('questions');

        // Create the unique name and the ObjectId of the User for the Survey.
        Response::create([
            'survey_id' => $survey->_id,
            'user_id' => $userObjectId,
            'answers' => [],
        ]);

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

        // Retrieve the User from MongoDB.
        $userObjectId = $this->getMongoUserObjectId();

        // Collect questions from current Survey.
        $questions = $survey->getAttributeValue('questions');

        // Create the unique name and the ObjectId of the User for the Survey.
        Response::create([
            'survey_id' => $survey->_id,
            'user_id' => $userObjectId,
            'answers' => [],
        ]);

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

        // Retrieve the User from MongoDB.
        $userObjectId = $this->getMongoUserObjectId();

        // Collect questions from current Survey.
        $questions = $survey->getAttributeValue('questions');

        // Create the unique name and the ObjectId of the User for the Survey.
        Response::create([
            'survey_id' => $survey->_id,
            'user_id' => $userObjectId,
            'answers' => [],
        ]);

        // Redirect back with successful message.
        return to_route('get.question', ['survey' => $survey])->with('message', 'Well played! Your question for the survey is done.');
    }
}
