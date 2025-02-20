<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-900">Questions</h1>
                <a href="{{ route('questions.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Poser une question
                </a>
            </div>

            @if($questions->count())
                @foreach($questions as $question)
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
                                <div class="text-sm text-gray-600">
                                    {{ $question->answers->count() }} réponses
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="mt-4">
                    {{ $questions->links() }}
                </div>
            @else
                <p class="text-gray-600">Aucune question pour le moment.</p>
            @endif
        </div>
    </div>
</x-app-layout>
