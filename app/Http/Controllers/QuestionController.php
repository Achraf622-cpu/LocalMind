<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $questions = Question::select('id', 'title', 'user_id', 'created_at')  // Sélectionnez uniquement les champs nécessaires
        ->with(['user:id,name'])  // Chargement minimal des relations
        ->latest()
            ->simplePaginate(10);  // Utilisation de simplePaginate au lieu de paginate

        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:10'
        ]);

        $question = auth()->user()->questions()->create($validated);
        return redirect()->route('questions.show', $question)
            ->with('success', 'Question créée avec succès !');
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        $this->authorize('update', $question);
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $this->authorize('update', $question);

        $validatedData = $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:10',
        ]);

        $question->update($validatedData);

        return redirect()->route('questions.show', $question)
            ->with('success', 'Question mise à jour avec succès');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')
            ->with('success', 'Question supprimée avec succès !');
    }
}
