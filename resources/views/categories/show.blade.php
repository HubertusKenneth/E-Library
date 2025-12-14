@extends('layouts.app')

@section('content')
  <div class="flex items-center justify-between mb-4">
    <h1 class="text-2xl font-bold">{{ __('results_for_genre', ['genre' => $decodedGenre]) }}</h1>

    <a href="{{ url('/categories') }}"
       class="px-4 py-2 bg-slate-800 text-white rounded hover:bg-slate-900 transition">
      {{ __('back_to_genres') }}
    </a>
  </div>

  @if ($books->isEmpty())
    <p>{{ __('no_books_in_genre') }}</p>
  @else
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
      @foreach ($books as $book)
        <div class="bg-white p-4 shadow rounded hover:bg-slate-50">
          <img src="{{ asset('storage/' . $book->cover) }}"
               alt="{{ $book->title }}"
               class="w-full h-48 object-cover rounded mb-3">
          <h3 class="text-lg font-semibold">{{ $book->title }}</h3>
          <p class="text-gray-600 text-sm">{{ __('by_author_cap', ['author' => $book->author]) }}</p>
        </div>
      @endforeach
    </div>
  @endif
@endsection
