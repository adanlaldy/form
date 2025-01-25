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

//    /**
//     * Store a new title Survey in storage.
//     *
//     * @param Request $request
//     * @return RedirectResponse
//     */
//    public function storeSurveyTitle(Request $request): RedirectResponse
//    {
//        // Check if input are valid and unique with the method validate() and return an error if failed.
//        $request->validate([
//            'title' => 'required|unique:surveys:title',
//        ]);
//
//        // Check if the Survey title already exist and if the title exist, return an error.
//        $existingTitle = Survey::where('title', $request['title'])->first();
//        if ($existingTitle) {
//            return back()->withErrors(['title' => 'Survey title already exists']);
//        }
//
//        // Retrieve the _id of the User connected in MongoDB.
//        $mongoUserId = $this->getMongoUserId();
//
//        // Create the unique title and the ObjectId of the User for the Survey.
//        Survey::create([
//            'title' => $request['title'],
//            'creator' => new ObjectId($mongoUserId),
//            'questions' => [],
//        ]);
//
//        // Redirect back with successful message.
//        return back()->with('message', 'The title is valid! You can now continue to edit your Survey.');
//    }

//    /**
//     * Store a new Survey in storage.
//     *
//     * @param Request $request
//     * @return RedirectResponse
//     */
//    public function storeSurvey(Request $request): RedirectResponse
//    {
//        // Check if input are valid and unique with the method validate() and return an error if failed.
//        $request->validate([
//            'title' => 'required|unique:surveys:title',
//        ]);
//
//        // Check if the Survey title already exist and if the title exist, return an error.
//        $existingTitle = Survey::where('title', $request['title'])->first();
//        if ($existingTitle) {
//            return back()->withErrors(['title' => 'Survey title already exists']);
//        }
//
//        // Retrieve the _id of the User connected in MongoDB.
//        $mongoUserId = $this->getMongoUserId();
//
//        // Create the Survey.
//        Survey::create([
//            'title' => $request['title'],
//            'creator' => new ObjectId($mongoUserId),
//            'questions' => [],
//        ]);
//    }
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
