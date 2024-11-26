<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::where('user_id', Auth::id())->first();
        $plants = Auth::user()->plants;
        return view('plants.index', compact('plants'));
    }

    public function create()
    {
        return view('plants.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'care_instructions' => 'required|string',
        'image' => 'nullable|image',
    ]);

    $plant = new Plant($request->all());
    $plant->user_id = Auth::id();
    if ($request->hasFile('image')) {
        $plant->image = $request->file('image')->store('plants');
    }
    $plant->save();

    return redirect()->route('plants.index')->with('success', 'Plant added successfully!');
}

    public function show(Plant $plant)
    {
        $plants = Plant::where('user_id', Auth::id())->first();
        return view('plants.show', compact('plant'));
    }

    public function edit(Plant $plant)
    {
        $plants = Plant::where('user_id', Auth::id())->first();
        return view('plants.edit', compact('plant'));
    }

    public function update(Request $request, Plant $plant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'care_instructions' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $plant->fill($request->all());
        if ($request->hasFile('image')) {
            $plant->image = $request->file('image')->store('plants');
        }
        $plant->save();

        return redirect()->route('plants.index')->with('success', 'Plant updated successfully!');
    }

    public function destroy(Plant $plant)
    {
        $plant->delete();
        return redirect()->route('plants.index')->with('success', 'Plant deleted successfully!');
    }
}