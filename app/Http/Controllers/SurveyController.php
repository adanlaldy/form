<?php

namespace App\Http\Controllers;

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
    private function getMongoUserId(): string
    {
        // Retrieve the currently authenticated User.
        $user = Auth::user();

        // Retrieve the User from MongoDB.
        $mongoUser = User::where('email', $user->email)->first();

        // Return the _id.
        return $mongoUser->_id;
    }

    /**
     * Show the all surveys page.
     *
     * @return View
     */
    public function allSurveysForm(): View
    {
        // Retrieve the currently authenticated user.
        $user = Auth::user();

        // Return all surveys view.
        return view('app/all_surveys')->with('user', $user);
    }

    /**
     * Show the form for creating or editing a survey.
     *
     * @return View
     */
    public function surveyForm(): View
    {
        // Retrieve the _id of the User connected in MongoDB.
        $mongoUserId = $this->getMongoUserId();

        // Create a ObjectId with the $mongoUserId to using the Eloquent command.
        $userObjectId = new ObjectId($mongoUserId);

        // Retrieve the Survey with the $userObjectId and the questions empty.
        $survey = Survey::where('creator', $userObjectId)->whereRaw(['questions' => ['$size' => 0]])->first();

        // Return survey view with $survey.
        return view('app/survey')->with('survey', $survey);
    }

    /**
     * Store a new name Survey in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeSurveyName(Request $request): RedirectResponse
    {
        // Check if input are valid and unique with the method validate() and return an error if failed.
        $request->validate([
            'name' => 'required|unique:surveys:name',
        ]);

        // Check if the Survey name already exist and if the name exist, return an error.
        $existingName = Survey::where('name', $request['name'])->first();
        if ($existingName) {
            return back()->withErrors(['name' => 'Survey name already exists']);
        }

        // Retrieve the _id of the User connected in MongoDB.
        $mongoUserId = $this->getMongoUserId();

        // Create the unique name and the ObjectId of the User for the Survey.
        Survey::create([
            'name' => $request['name'],
            'creator' => new ObjectId($mongoUserId),
            'questions' => [],
        ]);

        // Redirect back with successful message.
        return back()->with('message', 'The name is valid! You can now continue to edit your Survey.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        //
    }
}
