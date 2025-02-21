<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Routes d'authentification
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes de questions (publiques)
Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('questions.show');

// Routes protégées (à vérifier dans le contrôleur)
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
Route::put('/questions/{question}', [QuestionController::class, 'update'])->name('questions.update');
Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.delete');

// Routes des utilisateurs
Route::resource('users', UserController::class);

// Routes des réponses
Route::post('questions/{question}/answers', [AnswerController::class, 'store'])->name('answers.store');
Route::get('answers/{answer}/edit', [AnswerController::class, 'edit'])->name('answers.edit');
Route::put('answers/{answer}', [AnswerController::class, 'update'])->name('answers.update');
Route::delete('answers/{answer}', [AnswerController::class, 'destroy'])->name('answers.destroy');

// Routes des favoris
Route::post('questions/{question}/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
Route::delete('questions/{question}/favorites', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
Route::get('favorites', [FavoriteController::class, 'index'])->name('favorites.index');
