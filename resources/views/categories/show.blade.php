@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-4">Here's the results for {{ $decodedGenre }}</h1>

  @if ($books->isEmpty())
    <p>No books available in this genre.</p>
  @else
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
      @foreach ($books as $book)
        <div class="bg-white p-4 shadow rounded hover:bg-slate-50">
          <img src="{{ asset('storage/' . $book->cover) }}" 
               alt="{{ $book->title }}" 
               class="w-full h-48 object-cover rounded mb-3">
          <h3 class="text-lg font-semibold">{{ $book->title }}</h3>
          <p class="text-gray-600 text-sm">By {{ $book->author }}</p>
        </div>
      @endforeach
    </div>
  @endif
@endsection
