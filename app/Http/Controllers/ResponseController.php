<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Response;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\BSON\ObjectId;

class ResponseController extends Controller
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

    public function responseForm(Survey $survey)
    {

        // Collect answers from current Survey.
        $response = Response::where('survey_id', $survey->_id)->first();
        $answers = $response->getAttributeValue('answers');

        // Return new question view.
        return view('app/answers', compact('survey', 'answers'));
    }

    /**
     * Store a new Response in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeResponse(Request $request)
    {

        // Check if input are valid and unique with the method validate() and return an error if failed.
        $answer = $request->validate([
            'answer' => 'required',
        ]);

        // Retrieve the currently authenticated User.
        $user = Auth::user();

        // Retrieve the User from MongoDB.
        $mongoUser = User::where('email', $user->email)->first();

        // Collect the survey and the question id with the params.
        $surveyId = $request->input('survey_id');
        $questionId = $request->input('question_id');
//        $answer = Answer::create([
//            'question_id' => $surveyId,
//            'answer' => $answer,
//        ]);

        // Collect the Survey created by the User and update the 'questions' field.
        Response::where('user_id', $mongoUser->_id)
            ->where('survey_id', $surveyId)->first()
            ->update(['answers' => [
                'question_id' => $questionId,
                'answer' => $answer['answer'],
            ]]);

        // Create the unique name and the ObjectId of the User for the Survey.
//        Response::create([
//            'survey_id' => $surveyId,
//            'user_id' => $mongoUserObjectId,
//            'answers' => [
//                'question_id' => $questionId,
//                'answer' => $answer['answer'],
//            ],
//        ]);

        // Redirect to get.newQuestion route with successful message.
        return redirect()->back();
    }
}
