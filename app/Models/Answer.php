<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'content',
        'question_id',
        'user_id'
    ];

    // Relation avec la question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    // Relation avec l'utilisateur qui a répondu
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
