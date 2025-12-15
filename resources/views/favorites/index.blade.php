@extends('layouts.app')
@section('content')
<div class="flex items-center mb-4">
    <h2 class="text-xl font-semibold mr-2">My Favorites</h2>
    
    @if(isset($favoriteCount) && isset($maxFavorites))
      <span class="text-lg font-medium text-gray-700">
        ({{ $favoriteCount }}/{{ $maxFavorites }})
      </span>
    @endif
</div>

  <div class="grid md:grid-cols-3 gap-6">
    @forelse($books as $book)
      <div class="bg-white p-4 rounded shadow">
        <img src="{{ asset('storage/'.$book->cover) }}" class="h-40" alt="cover">
         <h3 class="font-semibold">{{ $book->title }}</h3>
         <p class="text-xs text-gray-500">by {{ $book->author }}</p>
         <a href="{{ route('books.show',$book) }}" class="mt-4 inline-block px-3 py-2 bg-slate-800 text-white rounded">View</a>
      </div>
    @empty
      <p>No favorites yet.</p>
    @endforelse
  </div>
  <div class="mt-6">{{ $books->links() }}</div>
@endsection
