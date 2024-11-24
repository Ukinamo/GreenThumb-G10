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
            'website' => 'nullable|url|max:255',
        ]);

        $profile = Profile::updateOrCreate(
            ['user_id' => Auth::id()],
            $request->only('bio', 'location', 'website')
        );

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}