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
<a href="{{ route('books.show', $book) }}"
   class="px-3 py-2 rounded text-white bg-slate-800 mb-4">
   View Details
</a>
    
    <!-- @auth -->
        <!-- User login -->
        <form action="{{ route('books.favorite', $book) }}" method="POST">
            @csrf
            <button type="submit" class="px-3 py-2 border rounded">
                {{ auth()->user()->favorites->contains($book->id) ? 'Unfavorite' : 'Add to Favorite' }}
            </button>
        </form>
    @else
        <!-- Guest -->
        <button onclick="showPopup()" 
        class="px-3 py-2 rounded border text-gray bg-white-800 mb-4 hover:text-gray-900">
        <!-- px-3 py-2 rounded text-white bg-slate-800 mb-4 -->
    Add to Favorite
</button>

<!-- Hidden popup -->
<div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm text-center">
    <h2 class="text-lg font-semibold mb-2">Please Login</h2>
    <p class="text-gray-600 mb-4">You need to login to add this book to favorites!</p>
    <button onclick="hidePopup()" 
            class="px-4 py-2 bg-slate-900 text-white rounded hover:bg-slate-700">
      OK
    </button>
  </div>
</div>
    @endauth
</div>

    </div>
    @endforeach
  </div>

  <div class="mt-6">
    {{ $books->withQueryString()->links() }}
  </div>
@endsection

<script>
  function showPopup() {
    document.getElementById('popup').classList.remove('hidden');
  }
  function hidePopup() {
    document.getElementById('popup').classList.add('hidden');
  }
</script>
