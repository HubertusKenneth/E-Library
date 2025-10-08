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

          <div class="mt-6 flex gap-2">
          <a href="{{ route('books.index') }}" class="px-3 py-2 rounded text-white bg-slate-800">Back</a>

          @auth
              @if(auth()->user()->role === 'admin')
                  <a href="{{ route('admin.books.edit', $book) }}" 
                    class="px-3 py-2 rounded text-white bg-blue-500 hover:bg-blue-600">
                    Edit Book
                  </a>
                  
                  <form action="{{ route('admin.books.destroy', $book) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');" class="inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="px-3 py-2 rounded text-white bg-red-600 hover:bg-red-700">
                          Delete Book
                      </button>
                  </form>
              @else
                  <form action="{{ route('books.favorite', $book) }}" method="POST" class="inline-block">
                      @csrf
                      <button class="px-3.5 py-2.5 text-sm border rounded hover:bg-gray-100">
                        {{ auth()->user()->favorites->contains($book->id) ? 'Unfavorite' : 'Add to Favorite' }}
                      </button>
                  </form>
              @endif
          @else
              <button onclick="showPopup()" 
                      class="px-3 py-2 border rounded text-gray-600 hover:text-gray-900">
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
      </div>
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
