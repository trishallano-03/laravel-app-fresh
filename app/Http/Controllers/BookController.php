<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // 1. LIST & SEARCH
    public function index(Request $request) {
        $query = Book::query();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                  ->orWhere('author', 'like', "%{$request->search}%");
            });
        }

        if ($request->filled('genre')) {
            $query->where('genre', $request->genre);
        }

        $books = $query->get();
        return view('books.index', compact('books'));
    }

    // 2. SHOW CREATE FORM
    public function create() {
        return view('books.create');
    }

    // 3. SAVE NEW BOOK
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required',
            'genre' => 'required',
            'published_year' => 'required|integer',
            'isbn' => 'required|unique:books,isbn',
            'pages' => 'required|integer',
            'language' => 'required',
            'publisher' => 'required',
            'price' => 'required|numeric',
        ]);
        
        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }
        
        $validated['is_available'] = $request->has('is_available');

        Book::create($validated);
        return redirect('/books')->with('success', 'Book added successfully!');
    }

    // 4. SHOW EDIT FORM
    public function edit(\App\Models\Book $book) {
        return view('books.edit', compact('book'));
    }

    // 5. UPDATE EXISTING BOOK
    public function update(Request $request, Book $book) {
    // 1. Validate - Every field here MUST be present in your HTML form
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'description' => 'required',
        'genre' => 'required',
        'published_year' => 'required|integer',
        'isbn' => 'required|unique:books,isbn,' . $book->id, // Ignore current book ISBN
        'pages' => 'required|integer',
        'language' => 'required',
        'publisher' => 'required',
        'price' => 'required|numeric',
    ]);

    // 2. Handle File Upload
    if ($request->hasFile('cover_image')) {
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }
        $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
    }

    $validated['is_available'] = $request->has('is_available');

    // 3. Save to Database
    $book->update($validated);

    // 4. REDIRECT to Index (This is the logic you needed)
    return redirect('/books')->with('success', 'Book updated successfully!');
}

    // 6. DELETE BOOK
    public function destroy(Book $book) {
        // Delete the image file from storage if it exists
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }

        $book->delete();
        return redirect('/books')->with('success', 'Book deleted!');
    }
}