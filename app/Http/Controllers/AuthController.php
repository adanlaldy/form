<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Show the home page.
     *
     * @return View
     */
    public function home(): View
    {
        // Return home view.
        return view('home');
    }

    /**
     * Show the register page.
     *
     * @return View
     */
    public function registerForm(): View
    {
        // Return register view.
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

        // Redirect to log in view.
        return redirect()->route('get.login')->with('message', 'Your account has been created');
    }

    /**
     * Show the login page.
     *
     * @return View
     */
    public function loginForm()
    {
        // Return log in view.
        return view('login');
    }

    /***
     * Log in a User.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request)
    {
        // Check if input are valid with the method validate() and return an error if failed.
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // If authentication fails, return back with error.
        if (!Auth::attempt($request->only('email', 'password'))) {

            return redirect()->back()->with('message', 'Invalid Credentials');
        }

        // If authentication succeeds, regenerate the session and redirect to the dashboard.
        $request->session()->regenerate();
        return redirect()->route('all.surveys')->with('message', 'You have been logged in');
    }

    /***
     * Log out a User.
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        // Log out the current User.
        Auth::logout();

        // Redirect to log in view.
        return redirect()->route('get.login')->with('message', 'You have been logged out');
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
