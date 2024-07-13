<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto px-4">
                        <div class="flex items-center justify-between mb-6">
                            <h1 class="text-3xl font-bold">Список книг</h1>
                            <button id="refreshBooks" type="button" class="bg-green-500 text-white p-2 rounded hover:bg-green-600">
                                Оновити список книг
                            </button>
                            <a href="{{ route('book-create') }}">AddBook</a>
                        </div>
                        <ul id="bookList" class="space-y-4">
                            @foreach($books as $book)
                            <li class="border p-4 rounded-lg shadow-md">
                                <a href="{{ url('/book', $book->id) }}" class="text-lg font-semibold text-blue-600 hover:underline">{{ $book->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('refreshBooks').addEventListener('click', function() {
            fetchBooks();
        });

        setInterval(function() {
            fetchBooks();
        }, 60000);

        function fetchBooks() {
            fetch('{{ url('/books') }}')
                .then(response => response.json())
                .then(books => {
                    let bookList = document.getElementById('bookList');
                    bookList.innerHTML = '';
                    books.forEach(book => {
                        let li = document.createElement('li');
                        li.className = 'border p-4 rounded-lg shadow-md';
                        li.innerHTML = `<a href="{{ url('/book') }}/${book.id}" class="text-lg font-semibold text-blue-600 hover:underline">${book.title}</a>`;
                        bookList.appendChild(li);
                    });
                });
        }

        // Fetch books on initial load
        fetchBooks();
    </script>
</x-app-layout>
