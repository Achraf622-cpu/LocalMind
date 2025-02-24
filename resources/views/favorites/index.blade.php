@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0 h4">Mes Questions Favorites</h2>
                    </div>

                    <div class="card-body">
                        @if($favorites->count() > 0)
                            @foreach($favorites as $favorite)
                                @if($favorite->question)
                                    <div class="question-card mb-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="mb-1">
                                                <a href="{{ route('questions.show', $favorite->question->id) }}"
                                                   class="text-decoration-none text-primary">
                                                    {{ $favorite->question->title }}
                                                </a>
                                            </h5>
                                            <small class="text-muted">
                                                Ajoutée le {{ $favorite->created_at->format('d/m/Y') }}
                                            </small>
                                        </div>
                                        <p class="text-muted mb-2">
                                            {{ Str::limit($favorite->question->content, 200) }}
                                        </p>
                                        <div class="d-flex justify-content-end">
                                            <form action="{{ route('favorites.destroy', $favorite->question) }}"
                                                  method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-outline-danger btn-sm">
                                                    Retirer des favoris
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    @if(!$loop->last)
                                        <hr class="my-4">
                                    @endif
                                @endif
                            @endforeach

                            <div class="d-flex justify-content-center mt-4">
                                {{ $favorites->links() }}
                            </div>
                        @else
                            <div class="text-center py-4">
                                <p class="text-muted mb-0">Vous n'avez pas encore de questions favorites.</p>
                                <a href="{{ route('questions.index') }}"
                                   class="btn btn-primary mt-3">
                                    Parcourir les questions
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
