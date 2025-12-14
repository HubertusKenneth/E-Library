@extends('layouts.app')

@section('content')
  <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">{{ __('ui.edit_book_title', ['title' => $book->title]) }}</h1>

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
        <label class="block font-semibold">{{ __('ui.title') }}</label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}" class="w-full border rounded px-3 py-2" required>
      </div>

      <div>
        <label class="block font-semibold">{{ __('ui.author') }}</label>
        <input type="text" name="author" value="{{ old('author', $book->author) }}" class="w-full border rounded px-3 py-2" required>
      </div>

      <div>
        <label class="block font-semibold">{{ __('ui.publisher') }}</label>
        <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}" class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block font-semibold">{{ __('ui.year') }}</label>
        <input type="number" name="year" value="{{ old('year', $book->year) }}" class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block font-semibold">{{ __('ui.genre_field') }}</label>
        <input type="text" name="genre" value="{{ old('genre', $book->genre) }}" class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block font-semibold">{{ __('ui.description') }}</label>
        <textarea name="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description', $book->description) }}</textarea>
      </div>

      <div>
        <label class="block font-semibold">{{ __('ui.current_cover') }}</label>
        @if($book->cover)
            <img src="{{ asset('storage/'.$book->cover) }}" class="h-20 mb-2" alt="{{ __('ui.current_cover') }}">
            <p class="text-sm text-gray-500">{{ __('ui.upload_replace_cover') }}</p>
        @else
            <p class="text-sm text-gray-500">{{ __('ui.no_cover_uploaded') }}</p>
        @endif
        <label class="block font-semibold mt-2">{{ __('ui.new_cover_optional') }}</label>
        <input type="file" name="cover" class="w-full border rounded px-3 py-2 mb-10">
      </div>

      <div class="flex justify-between items-center">
        <a href="{{ route('admin.books.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">{{ __('ui.cancel') }}</a>
        <button type="submit" class="px-4 py-2 bg-slate-800 text-white rounded">{{ __('ui.update_book') }}</button>
      </div>
    </form>
  </div>
@endsection
