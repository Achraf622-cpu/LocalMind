<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-900 mb-6">Mes Questions Favorites</h1>

            @if($favorites->count())
                @foreach($favorites as $question)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h2 class="text-xl font-bold mb-2">
                                        <a href="{{ route('questions.show', $question) }}" class="text-blue-600 hover:text-blue-800">
                                            {{ $question->title }}
                                        </a>
                                    </h2>
                                    <p class="text-gray-600 text-sm">
                                        Posée par {{ $question->user->name }} | {{ $question->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <form action="{{ route('favorites.destroy', $question) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-500 hover:text-red-700"
                                            onclick="return confirm('Retirer des favoris ?')">
                                        Retirer des favoris
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="mt-4">
                    {{ $favorites->links() }}
                </div>
            @else
                <p class="text-gray-600">Vous n'avez pas encore de questions favorites.</p>
            @endif
        </div>
    </div>
</x-app-layout>
