<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\FavoriteController;

// Routes pour les questions
Route::resource('questions', QuestionController::class);

// Routes pour les réponses (uniquement les actions nécessaires)
Route::post('questions/{question}/answers', [AnswerController::class, 'store'])->name('answers.store');
Route::get('answers/{answer}/edit', [AnswerController::class, 'edit'])->name('answers.edit');
Route::put('answers/{answer}', [AnswerController::class, 'update'])->name('answers.update');
Route::delete('answers/{answer}', [AnswerController::class, 'destroy'])->name('answers.destroy');

// Routes pour les favoris
Route::post('questions/{question}/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
Route::delete('questions/{question}/favorites', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
Route::get('favorites', [FavoriteController::class, 'index'])->name('favorites.index');
