@extends('layouts.app')

@section('content')
  <h2 class="text-center text-2xl font-semibold mb-6">Library Catalog</h2>

  {{-- 🔍 Search + Sort Form --}}
  <form method="GET" class="max-w-md mx-auto mb-6 flex gap-2">
    <input 
      type="text" 
      name="q" 
      value="{{ $q ?? '' }}" 
      placeholder="Search by title, author, or genre..."
      class="w-full border rounded px-3 py-2"
    />

    <select 
      name="sort" 
      onchange="this.form.submit()" 
      class="border rounded px-3 py-2 bg-white"
    >
      <option value="">Sort</option>
      <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>A–Z</option>
      <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Z–A</option>
    </select>
  </form>

  {{-- 🧹 Optional: Clear Filter --}}
  @if(request('q') || request('sort'))
    <div class="text-center mb-4">
      <a href="{{ route('books.index') }}" 
         class="text-sm text-slate-600 hover:underline">
         Clear filters
      </a>
    </div>
  @endif

  {{-- 📚 Books Grid --}}
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

          @auth
              @if(auth()->user()->role === 'admin')
                  <a href="{{ route('admin.books.edit', $book) }}" 
                    class="px-3 py-2 rounded text-white bg-blue-500 hover:bg-blue-600 mb-4">
                    Edit
                  </a>
                  
                  <form action="{{ route('admin.books.destroy', $book) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="px-3 py-2 rounded text-white bg-red-600 hover:bg-red-700 mb-4">
                          Delete
                      </button>
                  </form>
              @else
                  <form action="{{ route('books.favorite', $book) }}" method="POST">
                      @csrf
                      <button type="submit" class="px-3 py-2 border rounded">
                          {{ auth()->user()->favorites->contains($book->id) ? 'Unfavorite' : 'Add to Favorite' }}
                      </button>
                  </form>
              @endif
          @else
              <button onclick="showPopup()" 
                class="px-3 py-2 rounded border text-gray bg-white-800 mb-4 hover:text-gray-900">
                Add to Favorite
              </button>

              {{-- 🔔 Login Popup --}}
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

  {{-- 📄 Pagination --}}
  <div class="mt-6">
    {{ $books->withQueryString()->links() }}
  </div>

  <script>
    function showPopup() {
      document.getElementById('popup').classList.remove('hidden');
    }
    function hidePopup() {
      document.getElementById('popup').classList.add('hidden');
    }
  </script>
@endsection
