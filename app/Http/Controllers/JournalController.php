<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::where(function ($query) {
            $query->where('visibility', 'public')
                  ->orWhere('user_id', Auth::id());
        })->get();

        return view('journals.index', compact('journals'));
    }

    public function create()
    {
        $plants = Auth::user()->plants;
        return view('journals.create', compact('plants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plant_id' => 'required|exists:plants,id',
            'title' => 'nullable|string|max:255',
            'entry' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:10048',
            'mood' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'visibility' => 'required|in:public,private',
        ]);

        $journal = new Journal($request->all());
        $journal->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $destinationPath = public_path('uploads/journals');
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($destinationPath, $fileName);
            $journal->image = 'uploads/journals/' . $fileName;
        }

        $journal->save();

        return redirect()->route('journals.index')->with('success', 'Journal entry added successfully!');
    }

    public function show(Journal $journal)
    {
        if ($journal->visibility === 'private' && $journal->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access.');
        }
        return view('journals.show', compact('journal'));
    }

    public function edit(Journal $journal)
    {
        if ($journal->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access.');
        }

        $plants = Auth::user()->plants;
        return view('journals.edit', compact('journal', 'plants'));
    }

    public function update(Request $request, Journal $journal)
{
    if ($journal->user_id !== Auth::id()) {
        abort(403, 'Unauthorized access.');
    }

    $request->validate([
        'plant_id' => 'required|exists:plants,id',
        'title' => 'nullable|string|max:255',
        'entry' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:10048',
        'mood' => 'nullable|string|max:100',
        'location' => 'nullable|string|max:255',
        'visibility' => 'required|in:public,private',
    ]);

    // Fill in the fields excluding 'image'
    $journal->fill($request->except(['image']));

    // Handle the uploaded image
    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($journal->image && file_exists(public_path($journal->image))) {
            unlink(public_path($journal->image));
        }

        // Store the new image
        $destinationPath = public_path('uploads/journals');
        $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move($destinationPath, $fileName);
        $journal->image = 'uploads/journals/' . $fileName;
    }

    // Save the journal entry
    $journal->save();

    return redirect()->route('journals.index')->with('success', 'Journal entry updated successfully!');
}


    public function destroy(Journal $journal)
    {
        if ($journal->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access.');
        }

        if ($journal->image && file_exists(public_path($journal->image))) {
            unlink(public_path($journal->image));
        }

        $journal->delete();

        return redirect()->route('journals.index')->with('success', 'Journal entry deleted successfully!');
    }
}
