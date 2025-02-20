<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Question $question)
    {
        auth()->user()->favorites()->create([
            'question_id' => $question->id
        ]);

        return back()->with('success', 'Question ajoutée aux favoris !');
    }

    public function destroy(Question $question)
    {
        auth()->user()->favorites()
            ->where('question_id', $question->id)
            ->delete();

        return back()->with('success', 'Question retirée des favoris !');
    }

    public function index()
    {
        $favorites = auth()->user()->favoriteQuestions()->paginate(10);
        return view('favorites.index', compact('favorites'));
    }
}
