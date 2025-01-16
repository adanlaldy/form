<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Show the home page.
     *
     * @return View
     */
    public function home()
    {
        return view('index');
    }

    /**
     * Show the register page.
     *
     * @return View
     */
    public function showRegisterForm()
    {
        return view('register');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function register(Request $request): RedirectResponse
    {

        // Check if input are valid with the method validate() and return an error if failed.
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        // Create a User.
        User::create($validatedData);

        // Redirect to Login view.
        return redirect()->route('get.login')->with('message', 'Your account has been created');
    }

    /**
     * Show the login page.
     *
     * @return View
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /***
     * Login a User.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function login(Request $request)
    {

        // Check if input are valid with the method validate() and return an error if failed.
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Collect the user with the email entered.
        $user = User::where('email',$request['email'])->first();

        // If user doesn't exist or the password is incorrect, return back with error message.
        if(!$user || !Hash::check($request['password'],$user->password)){
            return back()->withErrors(['message' => 'Invalid Credentials']);
        }

        // Create a token for the user.
        $user->createToken($user->name.'-AuthToken')->plainTextToken;

        // Redirect to All surveys view.
        return redirect()->route('get.login')->with('message', 'You have been logged in');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
