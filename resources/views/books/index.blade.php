@extends('layouts.app')

@section('content')
  <h2 class="text-center text-2xl font-semibold mb-6">Library Catalog</h2>

  <form method="GET" class="max-w-md mx-auto mb-6">
    <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Search by title, author, or genre..."
      class="w-full border rounded px-3 py-2" />
  </form>

  <div class="grid md:grid-cols-3 gap-6">
    @foreach($books as $book)
    <div class="bg-white rounded shadow p-6">
      <h3 class="font-semibold">{{ $book->title }}</h3>
      <p class="text-xs text-gray-500">by {{ $book->author }}</p>

      <div class="my-4 flex justify-center">
        @if($book->cover)
          <img src="{{ asset('storage/'.$book->cover) }}" class="h-40" alt="cover">
        @else
          <div class="h-40 w-32 bg-gray-200 flex items-center justify-center">200x300</div>
        @endif
      </div>

      <p class="text-sm text-gray-600">{{ $book->publisher }} • {{ $book->year }}</p>

<div class="mt-4 flex gap-2">
    <a href="{{ route('books.show', $book) }}" class="px-3 py-2 rounded bg-slate-800 text-white">View Details</a>
    
    @auth
        <!-- User login -->
        <form action="{{ route('books.favorite', $book) }}" method="POST">
            @csrf
            <button type="submit" class="px-3 py-2 border rounded">
                {{ auth()->user()->favorites->contains($book->id) ? 'Unfavorite' : 'Add to Favorite' }}
            </button>
        </form>
    @else
        <!-- Guest -->
        <button onclick="alert('Please login to add this book to favorites!')" 
                class="px-3 py-2 border rounded text-gray-600 hover:text-gray-900">
            Add to Favorite
        </button>
    @endauth
</div>

    </div>
    @endforeach
  </div>

  <div class="mt-6">
    {{ $books->withQueryString()->links() }}
  </div>
@endsection
