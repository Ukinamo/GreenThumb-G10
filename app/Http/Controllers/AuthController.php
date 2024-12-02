<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plant; 
use App\Models\Journal; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Show the signup form
    public function showSignupForm()
    {
        return view('auth.signup');
    }

    // Handle the login process
    public function login(Request $request)
    {
        // Validate login inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login using provided credentials
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }

        // If login fails, return back with error message
        return back()->withErrors(['email', 'password' => 'Invalid credentials'])->withInput();
    }

    // Handle the signup process
    public function signup(Request $request)
    {
        // Validate signup inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            // Create new user
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Redirect to login page with success message
            return redirect()->route('login')->with('success', 'Registration successful. Please login.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle duplicate email error
            if ($e->getCode() == 23000) {
                return back()->withErrors(['email' => 'Email already exists.'])->withInput();
            } else {
                // Re-throw the exception if it's a different error
                throw $e;
            }
        }
    }

    // Show the user dashboard with plant and journal statistics
    public function dashboard()
    {
        // Assuming you have a 'user_id' field in the plants table to relate plants to users
        $plantsCount = Plant::where('user_id', Auth::id())->count(); 
        $journalsCount = Journal::where('user_id', Auth::id())->count(); 
        $plants = Plant::where('user_id', Auth::id())->latest()->take(3)->get();  // Fetch the latest 3 plants for the overview
    
        // Pass the data to the dashboard view
        return view('dashboard', compact('plantsCount', 'journalsCount', 'plants'));
    }
    

    // Logout the user
    public function logout()
    {
        Auth::logout();  // Log the user out
        return redirect()->route('login');  // Redirect to login page
    }
}
