@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>{{ $question->title }}</h4>
                        <small>Posée par {{ $question->user->name }} le {{ $question->created_at->format('d/m/Y') }}</small>
                    </div>

                    <div class="card-body">
                        <p>{{ $question->content }}</p>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <span>{{ $question->answers->count() }} réponses</span>

                            @if(auth()->id() === $question->user_id)
                                <div>
                                    <a href="{{ route('questions.edit', $question) }}" class="btn btn-sm btn-primary">Modifier</a>
                                    <form action="{{ route('questions.destroy', $question) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette question ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Section des réponses -->
                <div class="mt-4">
                    <h5>Réponses</h5>
                    @foreach($question->answers as $answer)
                        <div class="card mb-3">
                            <div class="card-body">
                                <p>{{ $answer->content }}</p>
                                <small class="text-muted">
                                    Répondu par {{ $answer->user->name }} le {{ $answer->created_at->format('d/m/Y') }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Formulaire pour ajouter une réponse -->
                <!-- Formulaire pour ajouter une réponse -->
                @auth
                    <div class="mt-4">
                        <h5>Votre réponse</h5>
                        <form action="{{ route('answers.store', $question) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="content" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Répondre</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
