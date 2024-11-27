<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $profile = Profile::where('user_id', Auth::id())->first();
        return view('profile.show', compact('profile'));
    }

    public function edit()
    {
        $profile = Profile::where('user_id', Auth::id())->first();
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'bio' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'hobbies' => 'nullable|string|max:255',
            'favorite_books' => 'nullable|string|max:255',
            'favorite_movies' => 'nullable|string|max:255',
            'favorite_music' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
        ]);

        $profile = Profile::updateOrCreate(
            ['user_id' => Auth::id()],
            $request->only('bio', 'location', 'hobbies', 'favorite_books', 'favorite_movies', 'favorite_music', 'country')
        );

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}