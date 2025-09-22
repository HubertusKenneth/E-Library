<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index()
    {
        $books = Book::paginate(12);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string',
            'author'=>'nullable|string',
            'publisher'=>'nullable|string',
            'year'=>'nullable|digits:4',
            'genre'=>'nullable|string',
            'description'=>'nullable|string',
            'cover'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers','public');
        }

        Book::create($data);
        return redirect()->route('admin.books.index')->with('success','Book created');
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title'=>'required|string',
            'author'=>'nullable|string',
            'publisher'=>'nullable|string',
            'year'=>'nullable|digits:4',
            'genre'=>'nullable|string',
            'description'=>'nullable|string',
            'cover'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('cover')) {
            if ($book->cover) Storage::disk('public')->delete($book->cover);
            $data['cover'] = $request->file('cover')->store('covers','public');
        }

        $book->update($data);
        return redirect()->route('admin.books.index')->with('success','Book updated');
    }

    public function destroy(Book $book)
    {
        if ($book->cover) Storage::disk('public')->delete($book->cover);
        $book->delete();
        return back()->with('success','Book deleted');
    }
}
