<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show the home page.
     */
    public function home()
    {
        return view('index');
    }

    /**
     * Store a newly created User in storage.
     */
    public function register(Request $request)
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
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Show the register page.
     */
    public function showRegisterForm()
    {
        return view('register');
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
