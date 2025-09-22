@extends('layouts.app')

@section('content')
  <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <div class="flex gap-6">
      <div class="w-1/3">
        @if($book->cover)
          <img src="{{ asset('storage/'.$book->cover) }}" alt="" class="w-full">
        @else
          <div class="h-60 bg-gray-200 flex items-center justify-center">200x300</div>
        @endif
      </div>
      <div class="flex-1">
        <h1 class="text-2xl font-bold">{{ $book->title }}</h1>
        <p class="text-gray-500">by {{ $book->author }}</p>
        <p class="mt-4">{{ $book->description }}</p>

        <div class="mt-4">
          <p class="text-sm text-gray-600">{{ $book->publisher }} • {{ $book->year }} • {{ $book->genre }}</p>
        </div>

        <div class="mt-6">
          <a href="{{ route('books.index') }}" class="px-3 py-2 border rounded">Back</a>

          @auth
            <form action="{{ route('books.favorite', $book) }}" method="POST" class="inline-block">
              @csrf
              <button class="px-3 py-2 bg-slate-800 text-white rounded">
                {{ auth()->user()->favorites->contains($book->id) ? 'Unfavorite' : 'Favorite' }}
              </button>
            </form>
          @endauth
        </div>
      </div>
    </div>
  </div>
@endsection
