<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{

    public function store(Request $request, Question $question)
    {
        $validatedData = $request->validate([
            'content' => 'required|min:10',
        ]);

        $answer = $question->answers()->create([
            'content' => $validatedData['content'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('questions.show', $question)
            ->with('success', 'Votre réponse a été publiée avec succès.');
    }
    public function edit(Answer $answer)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $this->authorize('update', $answer);
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
