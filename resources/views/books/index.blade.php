@extends('layouts.app')

@section('content')
  <h2 class="text-center text-2xl font-semibold mb-6">{{ __('library_catalog') }}</h2>

  <form method="GET" class="max-w-md mx-auto mb-6 flex gap-2 items-center">
    <input
      type="text"
      name="q"
      value="{{ $q ?? '' }}"
      placeholder="{{ __('search_placeholder') }}"
      class="w-full border rounded px-3 py-2"
    />

    <div x-data="{ open: false, selected: '{{ request('sort') ?? '' }}' }" class="relative">
      <button
        type="button"
        @click="open = !open"
        class="border rounded bg-white w-14 h-12 cursor-pointer flex items-center justify-center font-medium
               focus:ring-2 focus:ring-blue-500 transition"
      >
        <template x-if="!selected">
          <svg xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24" fill="none"
              stroke="black" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round"
              class="w-5 h-5">
            <path d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
          </svg>
        </template>

        <template x-if="selected">
          <span x-text="selected === 'asc' ? 'A–Z' : 'Z–A'"></span>
        </template>
      </button>

      <div
        x-show="open"
        @click.away="open = false"
        class="absolute right-0 mt-2 w-24 bg-white border rounded shadow-lg z-10"
      >
        <a href="{{ route('books.index', array_merge(request()->except('page'), ['sort' => 'asc'])) }}"
           @click="selected='asc'; open=false"
           class="block px-4 py-2 text-sm hover:bg-gray-100 {{ request('sort') == 'asc' ? 'bg-gray-50 font-semibold' : '' }}">
          A–Z
        </a>
        <a href="{{ route('books.index', array_merge(request()->except('page'), ['sort' => 'desc'])) }}"
           @click="selected='desc'; open=false"
           class="block px-4 py-2 text-sm hover:bg-gray-100 {{ request('sort') == 'desc' ? 'bg-gray-50 font-semibold' : '' }}">
          Z–A
        </a>
      </div>
    </div>
  </form>

  @if(request('q') || request('sort'))
    <div class="text-center mb-4">
      <a href="{{ route('books.index') }}"
         class="text-sm text-slate-600 hover:underline">
         {{ __('clear_filters') }}
      </a>
    </div>
  @endif

  <div class="grid md:grid-cols-3 gap-6">
    @foreach($books as $book)
      <div class="bg-white rounded shadow p-6 flex flex-col">
        <h3 class="font-semibold">{{ $book->title }}</h3>
        <p class="text-xs text-gray-500">{{ __('by_author_lower') }} {{ $book->author }}</p>

        <div class="my-4 flex justify-center">
      @if($book->cover)
          <img 
              src="{{ asset('storage/'.$book->cover) }}" 
              class="h-40 object-contain" 
              alt="cover"
          >
      @else

            <div class="h-40 w-32 bg-gray-200 flex items-center justify-center">200x300</div>
          @endif
        </div>

        <p class="text-sm text-gray-600">{{ $book->publisher }} • {{ $book->year }}</p>

        <div class="mt-4 flex flex-wrap gap-2 items-center justify-start">
          <a href="{{ route('books.show', $book) }}"
             class="w-32 h-11 flex items-center justify-center text-base font-normal text-white bg-slate-800 hover:bg-slate-900 rounded transition">
             {{ __('view_details') }}
          </a>

          @auth
              <form action="{{ route('books.favorite', $book) }}" method="POST">
                  @csrf
                  <button type="submit"
                          class="w-32 h-11 flex items-center justify-center text-base font-normal border rounded bg-white hover:bg-gray-100 transition">
                      {{ auth()->user()->favorites->contains($book->id) ? __('unfavorite') : __('add_to_favorite') }}
                  </button>
              </form>

              @if(auth()->user()->role === 'admin')
    
              
                  <a href="{{ route('admin.books.edit', $book) }}"
                     class="w-10 h-10 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded transition">
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
                        onsubmit="return confirm('{{ __('confirm_delete_book') }}');"
                        class="inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                              class="w-10 h-10 flex items-center justify-center bg-red-600 hover:bg-red-700 text-white rounded transition">
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
                  
              @endif
          @else
              <button onclick="showPopup()"
                      class="w-32 h-11 flex items-center justify-center text-base font-normal border bg-white hover:bg-gray-100 rounded transition">
                {{ __('add_to_favorite') }}
              </button>
          @endauth
        </div>
      </div>
    @endforeach
  </div>

  <div class="mt-6">
    {{ $books->withQueryString()->links() }}
  </div>

  <div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div id="popup-content"
         class="bg-white p-6 rounded-lg shadow-lg max-w-sm text-center transform scale-95 opacity-0 transition-all duration-300">

      <div class="flex justify-center mb-4 relative">
        <svg xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 100 100"
             class="w-20 h-20 text-red-600">
          <circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="4" fill="none"
                  stroke-dasharray="251" stroke-dashoffset="251"
                  class="animate-draw-circle" />
          <path d="M35 35 L65 65 M65 35 L35 65"
                stroke="currentColor" stroke-width="5" stroke-linecap="round"
                class="animate-pop-x" />
        </svg>
      </div>

      <h2 class="text-lg font-semibold mb-2">{{ __('please_login') }}</h2>
      <p class="text-gray-600 mb-4">{{ __('login_needed_favorites') }}</p>
      <button onclick="hidePopup()"
              class="px-4 py-2 bg-slate-900 text-white rounded hover:bg-slate-700 transition">
        {{ __('ok') }}
      </button>
    </div>
  </div>

  <style>
  @keyframes drawCircle { to { stroke-dashoffset: 0; } }
  @keyframes popX {
    0% { transform: scale(0); opacity: 0; }
    60% { transform: scale(1.2); opacity: 1; }
    100% { transform: scale(1); }
  }
  @keyframes spinPulse {
    0% { transform: rotate(0deg) scale(1); opacity: 1; }
    50% { transform: rotate(180deg) scale(1.05); opacity: 0.9; }
    100% { transform: rotate(360deg) scale(1); opacity: 1; }
  }
  .animate-draw-circle {
    animation: drawCircle 0.6s ease-out forwards, spinPulse 3s ease-in-out 0.6s infinite;
    transform-origin: center;
  }
  .animate-pop-x {
    transform-origin: center;
    animation: popX 0.4s ease-out 0.6s forwards;
  }
  </style>
@endsection
