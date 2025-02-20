<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user)
    {
        return true; // Tout le monde peut voir les questions
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Question $question)
    {
        return true; // Tout le monde peut voir une question
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return true; // Utilisateur connecté peut créer
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Question $question)
    {
        return $user->id === $question->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Question $question)
    {
        return $user->id === $question->user_id;
    }
}
