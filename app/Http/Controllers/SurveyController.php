<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use MongoDB\BSON\ObjectId;

class SurveyController extends Controller
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
     * Show the all surveys page.
     *
     * @return View
     */
    public function allSurveysForm(): View
    {

        // Retrieve all surveys.
        $surveys = Survey::get();

        // Return all surveys view.
        return view('app/all_surveys')->with('surveys', $surveys);
    }

    public function mySurveysForm(): View
    {
        // Retrieve the ObjectId of the User connected in MongoDB.
        $mongoUserObjectId = $this->getMongoUserObjectId();

        // Retrieve all surveys for the connected User.
        $surveys = Survey::where('creator', $mongoUserObjectId)->get();

        // Return your surveys view.
        return view('app/my_surveys')->with('surveys', $surveys);
    }

    /**
     * Store a new Survey with unique name in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeSurvey(Request $request): RedirectResponse
    {
        // Check if input are valid and unique with the method validate() and return an error if failed.
        $name = $request->validate([
            'name' => 'required',
        ]);

        // Check if the Survey name already exist and if the name exist, return an error.
        $existingName = Survey::where('name', $request['name'])->first();
        if ($existingName) {
            return back()->withErrors(['name' => 'Survey name already exists']);
        }

        // Retrieve the ObjectId of the User connected in MongoDB.
        $mongoUserObjectId = $this->getMongoUserObjectId();

        // Create the unique name and the ObjectId of the User for the Survey.
        $survey = Survey::create([
            'name' => $name['name'],
            'creator' => $mongoUserObjectId,
            'questions' => [],
        ]);

        // Redirect to get.newQuestion route with successful message.
        return to_route('get.newQuestion', ['survey' => $survey])->with('message', 'The name is valid! You can now continue to edit your Survey.');
    }

    /**
     * Show the new Survey form page.
     *
     * @return View
     */
    public function surveyForm(): View
    {
        return view('app/new_survey');
    }
}
