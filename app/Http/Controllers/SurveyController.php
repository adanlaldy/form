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
     * Show the all surveys page.
     *
     * @return View
     */
    public function allSurveys(): View
    {
        // Retrieve the currently authenticated user.
        $user = Auth::user();

        // Return all surveys view.
        return view('all_surveys')->with('user', $user);
    }

    /**
     * Show the form for creating a new survey.
     *
     * @return View
     */
    public function surveyForm(): View
    {
        // Retrieve the currently authenticated user.
        $user = Auth::user();

        // Collect the name of the Survey
        // Return survey view.
        return view('survey');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function storeSurveyName(Request $request): RedirectResponse
    {
        // Check if input are valid with the method validate() and return an error if failed.
        $request->validate([
            'name' => 'required|unique:surveys:name',
        ]);

        // Check if the Survey name already exist and if the name exist, return an error.
        $existingName = Survey::where('name', $request['name'])->first();
        if ($existingName) {
            return back()->withErrors(['name' => 'Survey name already exists']);
        }

        // Retrieve the currently authenticated User.
        $user = Auth::user();

        // Retrieve the User _id from Mongo DB.
        $mongoUser = User::where('email', $user->email)->first();
        $mongoUserId = $mongoUser->_id;

        // Create the unique name and the ObjectId of the User for the Survey.
        Survey::create([
            'name' => $request['name'],
            'creator' => new ObjectId($mongoUserId),
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
