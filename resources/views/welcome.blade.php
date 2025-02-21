<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocalMind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 font-[Poppins]">
<!-- Navigation -->
<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <span class="text-2xl font-bold text-indigo-600">LocalMind</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600">Accueil</a>
                <a href="{{ route('questions.index') }}" class="text-gray-600 hover:text-indigo-600">Questions</a>
                @auth
                    <a href="{{ route('favorites.index') }}" class="text-gray-600 hover:text-indigo-600">Mes Favoris</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                            Déconnexion
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                        Connexion
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center space-y-8">
            <h1 class="text-5xl font-bold text-gray-900 mb-4 leading-tight">
                Découvrez votre <span class="text-indigo-600">communauté locale</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Connectez-vous avec les entreprises et services locaux.
                Trouvez les meilleures opportunités près de chez vous.
            </p>
            <div class="flex justify-center gap-4 mt-8">
                <a href="{{ route('questions.index') }}" class="bg-indigo-600 text-white px-8 py-3 rounded-lg hover:bg-indigo-700 transition shadow-lg">
                    Commencer
                </a>
                <button class="bg-white text-indigo-600 px-8 py-3 rounded-lg hover:bg-gray-50 transition shadow-lg border border-indigo-600">
                    En savoir plus
                </button>
            </div>
        </div>

        <!-- Features Section -->
        <div class="grid md:grid-cols-3 gap-8 mt-20">
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                <div class="text-indigo-600 text-2xl mb-4">🏪</div>
                <h3 class="text-xl font-semibold mb-2">Commerces Locaux</h3>
                <p class="text-gray-600">Découvrez les meilleurs commerces de votre quartier</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                <div class="text-indigo-600 text-2xl mb-4">🤝</div>
                <h3 class="text-xl font-semibold mb-2">Communauté</h3>
                <p class="text-gray-600">Rejoignez une communauté active et engagée</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                <div class="text-indigo-600 text-2xl mb-4">📱</div>
                <h3 class="text-xl font-semibold mb-2">Facile à utiliser</h3>
                <p class="text-gray-600">Une interface intuitive pour tous</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
