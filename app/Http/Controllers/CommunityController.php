<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function index()
    {
        $questions = Question::with('user')->latest()->get();
        return view('community.index', compact('questions'));
    }

    public function create()
        {
            return view('community.create');
        }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $question = new Question($request->all());
        $question->user_id = Auth::id();
        $question->save();
        return redirect(route('community.index'));
    }

    public function show(Question $question)
    {
        $answers = $question->answers()->with('user')->get();   
        return view('community.show', compact('question', 'answers'));
    }
    
    public function answer(Request $request, Question $question)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $answer = new Answer($request->all());
        $answer->user_id = Auth::id();
        $answer->question_id = $question->id;
        $answer->save();

        return redirect()->route('community.show', $question)->with('success', 'Answer posted successfully!');
    }
}
