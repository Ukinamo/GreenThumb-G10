<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::where('user_id', Auth::id())->get();
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
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:10048',
        ]);

        // Create a new plant record
        $plant = new Plant($request->all());
        $plant->user_id = Auth::id();

        // Handle image upload if it exists
        if ($request->hasFile('image')) {
            $destinationPath = public_path('uploads/plants');
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($destinationPath, $fileName);
            $plant->image = 'uploads/plants/' . $fileName;
        }

        $plant->save();

        return redirect()->route('plants.index')->with('success', 'Plant added successfully!');
    }

    public function show(Plant $plant)
    {
        return view('plants.show', compact('plant'));
    }

    public function edit(Plant $plant)
    {
        return view('plants.edit', compact('plant'));
    }

    public function update(Request $request, Plant $plant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'care_instructions' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:10048',
        ]);

        // Update plant details
        $plant->fill($request->except(['image']));

        // Handle the uploaded image
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($plant->image && file_exists(public_path($plant->image))) {
                unlink(public_path($plant->image));
            }

            // Store the new image
            $destinationPath = public_path('uploads/plants');
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($destinationPath, $fileName);
            $plant->image = 'uploads/plants/' . $fileName;
        }

        $plant->save();

        return redirect()->route('plants.index')->with('success', 'Plant updated successfully!');
    }

    public function destroy(Plant $plant)
    {
        // Delete the plant image if it exists
        if ($plant->image && file_exists(public_path($plant->image))) {
            unlink(public_path($plant->image));
        }
        // Delete the plant
        $plant->delete();

        return redirect()->route('plants.index')->with('success', 'Plant deleted successfully!');
    }
}
