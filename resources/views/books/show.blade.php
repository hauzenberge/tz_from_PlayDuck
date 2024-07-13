<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <h1>{{ $book->title }}</h1>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto px-4">
                        <div class="text-center mb-6">
                            <h1 class="text-3xl font-bold">{{ $book->title }}</h1>
                            <p class="text-xl text-gray-600">Автор: {{ $book->author }}</p>
                            @if($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="mx-auto my-4 w-1/2 rounded-lg shadow-lg">
                            @endif
                            <p class="text-lg text-gray-500">Дата публікації: {{ $book->publication_date }}</p>
                            <p class="text-lg font-semibold mt-2">Середній рейтинг: {{ $averageRating }}</p>
                        </div>

                        <div class="mb-6">
                            <h2 class="text-xl font-semibold mb-2">Відгуки:</h2>
                            @foreach($book->reviews as $review)
                            <div class="border-b pb-4 mb-4">
                                <strong class="text-lg">{{ $review->user->name }}:</strong>
                                <p class="text-gray-700">{{ $review->comment }}</p>
                                <p class="text-yellow-500 font-bold">Оцінка: {{ $review->rating }}</p>
                            </div>
                            @endforeach
                        </div>

                        @auth
                        <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                            <h2 class="text-xl font-semibold mb-2">Залишити відгук:</h2>
                            <form action="{{ url('/book', $book->id) }}/review" method="post">
                                @csrf
                                <div class="mb-4">
                                    <label for="rating" class="block text-gray-700 font-medium">Рейтинг:</label>
                                    <input type="number" name="rating" min="1" max="5" required class="mt-1 p-2 border border-gray-300 rounded w-full">
                                </div>
                                <div class="mb-4">
                                    <label for="comment" class="block text-gray-700 font-medium">Коментар:</label>
                                    <textarea name="comment" rows="4" class="mt-1 p-2 border border-gray-300 rounded w-full"></textarea>
                                </div>
                                <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Залишити рейтинг</button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed bottom-0 right-0 m-4">
        <button id="refreshBooks" class="bg-green-500 text-white p-2 rounded hover:bg-green-600">
            Оновити список книг
        </button>
    </div>

    <script>
        document.getElementById('refreshBooks').addEventListener('click', function() {
            fetch('{{ url('/') }}')
                .then(response => response.text())
                .then(html => {
                    document.getElementById('bookList').innerHTML = html;
                });
        });
        setInterval(function() {
            fetch('{{ url('/') }}')
                .then(response => response.text())
                .then(html => {
                    document.getElementById('bookList').innerHTML = html;
                });
        }, 60000);
    </script>
</x-app-layout>
