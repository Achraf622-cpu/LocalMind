<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-start">
                        <h1 class="text-2xl font-bold mb-4">{{ $question->title }}</h1>

                        @if(auth()->check())
                            <div class="flex space-x-2">
                                @if(auth()->user()->id === $question->user_id)
                                    <a href="{{ route('questions.edit', $question) }}"
                                       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                        Modifier
                                    </a>
                                    <form action="{{ route('questions.destroy', $question) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette question ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('favorites.store', $question) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                                        Favoris
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>

                    <div class="mt-4 text-gray-600">
                        {{ $question->content }}
                    </div>

                    <div class="mt-8">
                        <h2 class="text-xl font-semibold mb-4">Réponses</h2>

                        @foreach($question->answers as $answer)
                            <div class="bg-gray-50 p-4 rounded-lg mb-4">
                                <div class="flex justify-between">
                                    <p class="text-sm text-gray-600">
                                        Par {{ $answer->user->name }} | {{ $answer->created_at->diffForHumans() }}
                                    </p>
                                    @if(auth()->check() && auth()->user()->id === $answer->user_id)
                                        <div class="flex space-x-2">
                                            <a href="{{ route('answers.edit', $answer) }}"
                                               class="text-blue-500 hover:text-blue-700">Modifier</a>
                                            <form action="{{ route('answers.destroy', $answer) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-500 hover:text-red-700"
                                                        onclick="return confirm('Êtes-vous sûr ?')">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <div class="mt-2">
                                    {{ $answer->content }}
                                </div>
                            </div>
                        @endforeach

                        @auth
                            <form action="{{ route('answers.store', $question) }}" method="POST" class="mt-6">
                                @csrf
                                <div>
                                    <label for="content" class="block text-sm font-medium text-gray-700">
                                        Votre réponse
                                    </label>
                                    <textarea name="content" id="content" rows="4"
                                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                              required></textarea>
                                </div>
                                <button type="submit"
                                        class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    Publier la réponse
                                </button>
                            </form>
                        @else
                            <p class="mt-4 text-gray-600">
                                <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">Connectez-vous</a>
                                pour répondre à cette question.
                            </p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
