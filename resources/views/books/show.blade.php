@extends('layouts.app')

@section('content')
@if(session('book_view_count') && session('book_view_count') !== 'Unlimited')
    <div class="view-counter"
         style="margin: 10px; padding: 5px; background-color: #e0f7fa; border: 1px solid #b2ebf2;">
        Books Viewed:
        <strong>{{ session('book_view_count') }}</strong> / 5
    </div>
@endif

<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <div class="flex gap-6">
        <div class="w-1/3">
            @if($book->cover)
                <img src="{{ asset('storage/'.$book->cover) }}" alt="{{ $book->title }}" class="w-full">
            @else
                <div class="h-60 bg-gray-200 flex items-center justify-center">200x300</div>
            @endif
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <div>
                <h1 class="text-2xl font-bold">{{ $book->title }}</h1>
                <p class="text-gray-500">{{ __('by_author_lower') }} {{ $book->author }}</p>

                <p class="mt-4">{{ $book->description }}</p>

                <div class="mt-4">
                    <p class="text-sm text-gray-600">
                        {{ $book->publisher }} • {{ $book->year }} • {{ $book->genre }}
                    </p>
                </div>
            </div>

            <div class="mt-6 flex gap-3 items-center">
                <a href="{{ route('books.index') }}"
                   class="flex items-center justify-center px-4 h-10 rounded text-white
                          bg-slate-800 hover:bg-slate-900 text-base font-normal">
                    {{ __('back') }}
                </a>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.books.edit', $book) }}"
                           class="flex items-center justify-center w-10 h-10 rounded
                                  bg-gray-200 hover:bg-gray-300 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 fill="none" stroke="black" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 class="w-5 h-5">
                                <path d="M12 20h9" />
                                <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3
                                         L7 19l-4 1 1-4L16.5 3.5z" />
                            </svg>
                        </a>

                        <form action="{{ route('admin.books.destroy', $book) }}"
                              method="POST"
                              onsubmit="return confirm('{{ __('confirm_delete_book') }}');"
                              class="flex items-center">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="flex items-center justify-center w-10 h-10 rounded
                                           text-white bg-red-600 hover:bg-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     class="w-5 h-5">
                                    <polyline points="3 6 5 6 21 6" />
                                    <path d="M19 6l-1 14a2 2 0 0 1-2 2H8
                                             a2 2 0 0 1-2-2L5 6" />
                                    <path d="M10 11v6" />
                                    <path d="M14 11v6" />
                                    <path d="M9 6V4a1 1 0 0 1 1-1h4
                                             a1 1 0 0 1 1 1v2" />
                                </svg>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('books.favorite', $book) }}"
                              method="POST" class="flex items-center">
                            @csrf
                            <button
                                class="flex items-center justify-center px-4 h-10 border
                                       rounded hover:bg-gray-100 text-base font-normal">
                                {{ auth()->user()->favorites->contains($book->id)
                                    ? __('unfavorite')
                                    : __('add_to_favorite') }}
                            </button>
                        </form>

                        @if($book->pdf_path)
                            <a href="{{ route('books.pdf', $book) }}"
                               class="flex items-center gap-2 px-4 h-10 rounded
                                      bg-blue-600 hover:bg-blue-700 text-white
                                      text-base font-normal">
                                <i class="bi bi-download"></i>
                                <span>{{ __('download_pdf') }}</span>
                            </a>
                        @endif
                    @endif
                @else
                    <button onclick="showPopup()"
                            class="flex items-center justify-center px-4 h-10 border
                                   rounded text-gray-600 hover:text-gray-900
                                   text-base font-normal">
                        {{ __('add_to_favorite') }}
                    </button>
                @endauth
            </div>
        </div>
    </div>
</div>

<div id="popup"
     class="fixed inset-0 flex items-center justify-center
            bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg
                max-w-sm text-center">
        <h2 class="text-lg font-semibold mb-2">
            {{ __('please_login') }}
        </h2>
        <p class="text-gray-600 mb-4">
            {{ __('login_needed_favorites') }}
        </p>
        <button onclick="hidePopup()"
                class="px-4 py-2 bg-slate-900 text-white
                       rounded hover:bg-slate-700">
            {{ __('ok') }}
        </button>
    </div>
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
