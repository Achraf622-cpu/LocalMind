<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocalMind</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom right, #EEF2FF, #E0E7FF);
        }
    </style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="#">LocalMind</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('questions.index') }}">Questions</a>
                </li>
                @auth
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary ms-2">Déconnexion</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-primary ms-2">Connexion</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="container py-5">
    <div class="text-center py-5">
        <h1 class="display-4 fw-bold mb-4">
            Découvrez votre <span class="text-primary">communauté locale</span>
        </h1>
        <p class="lead text-muted mb-5 mx-auto" style="max-width: 600px;">
            Connectez-vous avec les entreprises et services locaux.
            Trouvez les meilleures opportunités près de chez vous.
        </p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('questions.index') }}" class="btn btn-primary btn-lg shadow">
                Commencer
            </a>
            <button class="btn btn-outline-primary btn-lg">
                En savoir plus
            </button>
        </div>
    </div>

    <!-- Features Section -->
    <div class="row mt-5 g-4">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="display-5 mb-3">🏪</div>
                    <h3 class="h4 mb-2">Commerces Locaux</h3>
                    <p class="text-muted">Découvrez les meilleurs commerces de votre quartier</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="display-5 mb-3">🤝</div>
                    <h3 class="h4 mb-2">Communauté</h3>
                    <p class="text-muted">Rejoignez une communauté active et engagée</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="display-5 mb-3">📱</div>
                    <h3 class="h4 mb-2">Facile à utiliser</h3>
                    <p class="text-muted">Une interface intuitive pour tous</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
