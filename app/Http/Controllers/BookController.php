<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    // public function index(Request $request)
    // {
    //     $q = $request->input('q');

    //     $books = Book::when($q, function($query, $q) {
    //         $query->where('title', 'like', "%{$q}%")
    //               ->orWhere('author', 'like', "%{$q}%")
    //               ->orWhere('genre', 'like', "%{$q}%")
    //               ->orWhere('publisher', 'like', "%{$q}%");
    //     })->paginate(9);

    //     return view('books.index', compact('books', 'q'));
    // }

    public function index(Request $request)
    {
        $q = $request->input('q');
        $sort = $request->input('sort');

        $books = Book::when($q, function ($query, $q) {
            $query->where('title', 'like', "%{$q}%")
                ->orWhere('author', 'like', "%{$q}%")
                ->orWhere('genre', 'like', "%{$q}%")
                ->orWhere('publisher', 'like', "%{$q}%");
        })
            ->when($sort, function ($query, $sort) {
                $query->orderBy('title', $sort); // 'asc' or 'desc'
            })
            ->paginate(9);

        return view('books.index', compact('books', 'q', 'sort'));
    }



    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function toggleFavorite(Book $book)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'Please login to add this book to favorites!');
        }

        if ($user->favorites->contains($book->id)) {
            $user->favorites()->detach($book->id);
        } else {
            $user->favorites()->attach($book->id);
        }

        return redirect()->back();
    }

    public function favorites()
    {
        $books = Auth::user()->favorites()->paginate(9);
        return view('books.favorites', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|integer',
            'genre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:10240', // 10MB
        ]);

        $data = $request->only([
            'title',
            'author',
            'publisher',
            'year',
            'genre',
            'description',
        ]);

        // PDF
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $pdfName = time() . '_' . $pdf->getClientOriginalName();
            $pdfPath = $pdf->storeAs('pdfs', $pdfName, 'public');

            $data['pdf_path'] = $pdfPath;
            $data['pdf_name'] = $pdfName;
        }

        Book::create($data);

        return redirect()->route('books.index')
            ->with('success', 'Book added successfully!');
    }

    public function downloadPdf(Book $book)
    {
        if (!$book->pdf_path) {
            abort(404);
        }

        return Storage::disk('public')->download(
            $book->pdf_path,
            $book->pdf_name
        );
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // public function update(Request $request, string $id) {}
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|integer',
            'genre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'title',
            'author',
            'publisher',
            'year',
            'genre',
            'description'
        ]);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('covers'), $filename);
            $data['cover'] = $filename;
        }

        $book->update($data);

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully!');
    }


    public function destroy(string $id) {}
}
