<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;

class TipController extends Controller
{
    public function index()
    {
        $tips = Tip::all()->groupBy('month');
        return view('tips.index', compact('tips'));
    }

    public function create()
    {
        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        $plantTypes = [
        'Flowering Plants',
        'Foliage Plants', 
        'Succulents and Cacti', 
        'Trees', 'Shrubs', 
        'Climbers and Vines', 
        'Herbs', 'Grasses', 
        'Aquatic Plants', 
        'Edible Plants'];

        return view('tips.create', compact('months', 'plantTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'month' => 'required|string',
            'plant_type' => 'required|string',
            'tip' => 'required|string',
        ]);

        Tip::create($request->all());

        return redirect()->route('tips.index')->with('success', 'Tip added successfully!');
    }
}
