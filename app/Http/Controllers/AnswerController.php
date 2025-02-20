<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Question $question)
    {
        $validated = $request->validate([
            'content' => 'required|min:10'
        ]);

        $question->answers()->create([
            'content' => $validated['content'],
            'user_id' => auth()->id()
        ]);

        return back()->with('success', 'Réponse publiée avec succès !');
    }

    public function edit(Answer $answer)
    {
        $this->authorize('update', $answer);
        return view('answers.edit', compact('answer'));
    }

    public function update(Request $request, Answer $answer)
    {
        $this->authorize('update', $answer);

        $validated = $request->validate([
            'content' => 'required|min:10'
        ]);

        $answer->update($validated);
        return redirect()->route('questions.show', $answer->question)
            ->with('success', 'Réponse mise à jour avec succès !');
    }

    public function destroy(Answer $answer)
    {
        $this->authorize('delete', $answer);

        $question = $answer->question;
        $answer->delete();

        return redirect()->route('questions.show', $question)
            ->with('success', 'Réponse supprimée avec succès !');
    }
}
