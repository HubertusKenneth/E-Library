@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-4">{{ __('genres') }}</h1>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @foreach ($genres as $genre)
      <a href="{{ route('categories.show', urlencode($genre)) }}"
         class="bg-white shadow p-4 rounded hover:bg-gray-200 block">
        <h2 class="text-lg font-semibold">{{ $genre }}</h2>
      </a>
    @endforeach
  </div>
@endsection
