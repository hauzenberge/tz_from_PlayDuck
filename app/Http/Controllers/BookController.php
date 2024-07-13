<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->take(10)->get();
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::with('reviews')->findOrFail($id);
        $averageRating = $book->reviews->avg('rating');
        return view('books.show', compact('book', 'averageRating'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function getBooks()
    {
        $books = Book::latest()->take(10)->get();
        return response()->json($books);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'cover_image' => 'required|image',
            'publication_date' => 'required|date',
        ]);

        $path = $request->file('cover_image')->store('covers', 'public');

        $book = Book::create([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'cover_image' => $path,
            'publication_date' => $validated['publication_date'],
        ]);

        return redirect('/');
    }
}
