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
        $journals = Auth::user()->journals;
        // $journals = Journal::visible()->get();
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
            'title' => 'nullable|string',
            'entry' => 'required|string',
            'image' => 'nullable|image',
            'mood' => 'nullable|string',
            'location' => 'nullable|string',
            'visibility' => 'required|in:public,private',
        ]);

        $journal = new Journal($request->all());
        $journal->user_id = Auth::id();
        if ($request->hasFile('image')) {
            $journal->image = $request->file('image')->store('journals');
        }
        $journal->save();

        return redirect()->route('journals.index')->with('success', 'Journal entry added successfully!');
    }

    public function show(Journal $journal)
    {
        $plants = Auth::user()->plants;
        return view('journals.show', compact('journal', 'plants'));
    }

    public function edit(Journal $journal)
    {
        $plants = Auth::user()->plants;
        return view('journals.edit', compact('journal', 'plants'));
    }

    public function update(Request $request, Journal $journal)
    {
        $request->validate([
            'plant_id' => 'required|exists:plants,id',
            'title' => 'nullable|string',
            'entry' => 'required|string',
            'image' => 'nullable|image',
            'mood' => 'nullable|string',
            'location' => 'nullable|string',
            'visibility' => 'required|in:public,private',
        ]);

        $journal->fill($request->all());
        if ($request->hasFile('image')) {
            $journal->image = $request->file('image')->store('journals');
        }
        $journal->save();

        return redirect()->route('journals.index')->with('success', 'Journal entry updated successfully!');
    }

    public function destroy(Journal $journal)
    {
        $journal->delete();
        return redirect()->route('journals.index')->with('success', 'Journal entry deleted successfully!');
    }
}