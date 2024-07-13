<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add a New Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto px-4">
                        <h1 class="text-2xl font-bold mb-4">Додати нову книгу</h1>
                        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 font-medium">Назва книги:</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" required class="mt-1 p-2 border border-gray-300 rounded w-full">
                                @error('title')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="author" class="block text-gray-700 font-medium">Автор:</label>
                                <input type="text" name="author" id="author" value="{{ old('author') }}" required class="mt-1 p-2 border border-gray-300 rounded w-full">
                                @error('author')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="cover_image" class="block text-gray-700 font-medium">Обкладинка книги:</label>
                                <input type="file" name="cover_image" id="cover_image" class="mt-1 p-2 border border-gray-300 rounded w-full">
                                @error('cover_image')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="publication_date" class="block text-gray-700 font-medium">Дата публікації:</label>
                                <input type="date" name="publication_date" id="publication_date" value="{{ old('publication_date') }}" required class="mt-1 p-2 border border-gray-300 rounded w-full">
                                @error('publication_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Додати книгу</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>