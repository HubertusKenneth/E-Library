@extends('layouts.app')

@section('content')
  <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Edit Book: {{ $book->title }}</h1>

    @if ($errors->any())
      <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
        <ul>
          @foreach ($errors->all() as $error)
            <li>- {{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      @method('PUT')

      <div>
        <label class="block font-semibold">Title</label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}" class="w-full border rounded px-3 py-2" required>
      </div>

      <div>
        <label class="block font-semibold">Author</label>
        <input type="text" name="author" value="{{ old('author', $book->author) }}" class="w-full border rounded px-3 py-2" required>
      </div>

      <div>
        <label class="block font-semibold">Publisher</label>
        <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}" class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block font-semibold">Year</label>
        <input type="number" name="year" value="{{ old('year', $book->year) }}" class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block font-semibold">Genre</label>
        <input type="text" name="genre" value="{{ old('genre', $book->genre) }}" class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block font-semibold">Description</label>
        <textarea name="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description', $book->description) }}</textarea>
      </div>

      <div>
        <label class="block font-semibold">Current Cover</label>
        @if($book->cover)
            <img src="{{ asset('storage/'.$book->cover) }}" class="h-20 mb-2" alt="Current Cover">
            <p class="text-sm text-gray-500">Upload a new file to replace the current one.</p>
        @else
            <p class="text-sm text-gray-500">No cover image uploaded.</p>
        @endif
        <label class="block font-semibold mt-2">New Cover (optional)</label>
        <input type="file" name="cover" class="w-full border rounded px-3 py-2 mb-10">
      </div>

      <div class="flex justify-between items-center">
        <a href="{{ route('admin.books.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
        <button type="submit" class="px-4 py-2 bg-slate-800 text-white rounded">Update Book</button>
      </div>
    </form>
  </div>
@endsection