<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    // Relation avec l'utilisateur qui a posé la question
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec les réponses
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    // Relation avec les favoris
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // Relation avec les utilisateurs qui ont mis en favori
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
}
