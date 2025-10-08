@extends('layouts.app')

@section('content')
  <h2 class="text-center text-2xl font-semibold mb-6">Library Catalog</h2>

  <form method="GET" class="max-w-md mx-auto mb-6 flex gap-2 items-center">
    <input 
      type="text" 
      name="q" 
      value="{{ $q ?? '' }}" 
      placeholder="Search by title, author, or genre..."
      class="w-full border rounded px-3 py-2"
    />

<div class="relative">
  <select 
    name="sort" 
    onchange="this.form.submit()" 
    class="border rounded bg-white w-14 h-12 cursor-pointer text-center font-medium 
           focus:ring-2 focus:ring-blue-500 pl-6"
    style="-webkit-appearance: none; -moz-appearance: none; appearance: none;"
  >
    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>A–Z</option>
    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Z–A</option>
  </select>

  <!-- Icon filter -->
  <svg xmlns="http://www.w3.org/2000/svg" 
       viewBox="0 0 24 24" fill="none" 
       stroke="black" stroke-width="2" 
       stroke-linecap="round" stroke-linejoin="round"
       class="absolute left-2 top-1/2 transform -translate-y-1/2 w-4 h-4 pointer-events-none">
    <path d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
  </svg>
</div>

  </form>

  @if(request('q') || request('sort'))
    <div class="text-center mb-4">
      <a href="{{ route('books.index') }}" 
         class="text-sm text-slate-600 hover:underline">
         Clear filters
      </a>
    </div>
  @endif

  <div class="grid md:grid-cols-3 gap-6">
    @foreach($books as $book)
      <div class="bg-white rounded shadow p-6">
        <h3 class="font-semibold">{{ $book->title }}</h3>
        <p class="text-xs text-gray-500">by {{ $book->author }}</p>

        <div class="my-4 flex justify-center">
          @if($book->cover)
            <img src="{{ asset('storage/'.$book->cover) }}" class="h-40 object-contain" alt="cover">
          @else
            <div class="h-40 w-32 bg-gray-200 flex items-center justify-center">200x300</div>
          @endif
        </div>

        <p class="text-sm text-gray-600">{{ $book->publisher }} • {{ $book->year }}</p>

        <div class="mt-4 flex gap-2">
          <a href="{{ route('books.show', $book) }}"
            class="w-32 px-3 py-2 rounded text-white bg-slate-800 hover:bg-slate-900 text-center">
            View Details
          </a>

          @auth
              @if(auth()->user()->role === 'admin')
                  <a href="{{ route('admin.books.edit', $book) }}" 
                    class="w-10 h-10 rounded bg-gray-200 hover:bg-gray-300 flex items-center justify-center transition">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 24 24" fill="none" stroke="black" 
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                        class="w-5 h-5">
                      <path d="M12 20h9" />
                      <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                    </svg>
                  </a>

                  <form action="{{ route('admin.books.destroy', $book) }}" 
                        method="POST" 
                        onsubmit="return confirm('Are you sure you want to delete this book?');" 
                        class="inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" 
                              class="w-10 h-10 rounded text-white bg-red-600 hover:bg-red-700 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                             class="w-5 h-5">
                          <polyline points="3 6 5 6 21 6" />
                          <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                          <path d="M10 11v6" />
                          <path d="M14 11v6" />
                          <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                        </svg>
                      </button>
                  </form>
              @else
                  <form action="{{ route('books.favorite', $book) }}" method="POST">
                      @csrf
                      <button type="submit" 
                              class="w-32 px-3 py-2 border rounded hover:bg-gray-100">
                          {{ auth()->user()->favorites->contains($book->id) ? 'Unfavorite' : 'Add to Favorite' }}
                      </button>
                  </form>
              @endif
          @else
              <button onclick="showPopup()" 
                class="w-32 px-3 py-2 rounded border text-gray bg-white hover:text-gray-900">
                Add to Favorite
              </button>

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

  <script>
    function showPopup() {
      document.getElementById('popup').classList.remove('hidden');
    }
    function hidePopup() {
      document.getElementById('popup').classList.add('hidden');
    }
  </script>
@endsection
