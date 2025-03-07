<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'question_id'
    ];

    // Relation avec la question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function hasFavorited(Question $question)
    {
        return $this->favorites()->where('question_id', $question->id)->exists();
    }

}
