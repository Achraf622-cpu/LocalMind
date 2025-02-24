<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions - LocalMind</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">LocalMind</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                <a class="nav-link active" href="{{ route('questions.index') }}">Questions</a>
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary ms-2">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary ms-2">Connexion</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <h1 class="h2">Questions récentes</h1>
                @auth
                    <a href="{{ route('questions.create') }}" class="btn btn-primary">
                        Poser une question
                    </a>
                @endauth
            </div>
        </div>

        <!-- Questions List -->
        <div class="row">
            <div class="col-md-12">
                @foreach($questions as $question)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('questions.show', $question) }}" 
                                   class="text-decoration-none">
                                    {{ $question->title }}
                                </a>
                            </h5>
                            <p class="card-text text-muted">
                                {{ Str::limit($question->content, 200) }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <small class="text-muted">
                                    Par {{ $question->user->name }} • 
                                    {{ $question->created_at->diffForHumans() }}
                                </small>
                                @auth
                                    @if(auth()->id() === $question->user_id)
                                        <div>
                                            <a href="{{ route('questions.edit', $question) }}" 
                                               class="btn btn-sm btn-outline-primary me-2">
                                                Modifier
                                            </a>
                                            <form action="{{ route('questions.destroy', $question) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Êtes-vous sûr ?')">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>