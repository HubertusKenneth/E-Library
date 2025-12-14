@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-6">
    {{ __('welcome') }}, {{ Auth::check() ? Auth::user()->name : __('guest') }}
  </h1>

  <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <div class="bg-white border rounded p-6 shadow text-center">
      <h2 class="text-lg font-semibold">{{ __('total_books') }}</h2>
      <p class="text-3xl font-bold mt-2">{{ $totalBooks }}</p>
    </div>

    <div class="bg-white border rounded p-6 shadow text-center">
      <h2 class="text-lg font-semibold">{{ __('genre') }}</h2>
      <p class="text-3xl font-bold mt-2">{{ $totalGenres }}</p>
    </div>

    @if(Auth::check())
      @if(Auth::user()->role == 'admin')
        <div class="bg-white border rounded p-6 shadow text-center">
          <h2 class="text-lg font-semibold">{{ __('registered_users') }}</h2>
          <p class="text-3xl font-bold mt-2">{{ $totalUsers }}</p>
        </div>
      @else
        <div class="bg-white border rounded p-6 shadow text-center">
          <h2 class="text-lg font-semibold">{{ __('books_read') }}</h2>
          <p class="text-3xl font-bold mt-2">{{ $booksRead ?? 0 }}</p>
        </div>
      @endif
    @else
      <div class="bg-white border rounded p-6 shadow text-center">
        <h2 class="text-lg font-semibold">{{ __('available_features') }}</h2>
        <p class="text-base text-gray-600 mt-2">{{ __('view_and_explore_books') }}</p>
      </div>
    @endif

    @if(Auth::check())
      <div class="bg-white border rounded p-6 shadow text-center">
        <h2 class="text-lg font-semibold">{{ __('current_favorites') }}</h2>
        <p class="text-3xl font-bold mt-2">{{ $totalFavorites }}</p>
      </div>
    @else
      <div class="relative bg-white border rounded p-6 shadow text-center overflow-hidden group">
        <div class="blur-sm select-none pointer-events-none">
          <h2 class="text-lg font-semibold opacity-70">{{ __('current_favorites') }}</h2>
          <p class="text-3xl font-bold mt-2 opacity-60">0</p>
        </div>

        <div class="absolute inset-0 flex items-center justify-center">
          <div class="flex flex-col items-center gap-1 text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-8 h-8">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.5 10.5V7.125a4.125 4.125 0 1 0-8.25 0V10.5m-2.25 0h12.75M6.75 10.5a2.25 2.25 0 0 0-2.25 2.25v6.75A2.25 2.25 0 0 0 6.75 21.75h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25h-10.5z" />
            </svg>
          </div>
        </div>

        <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center
                    opacity-0 group-hover:opacity-100 transition-opacity duration-300">
          <span class="text-white text-sm font-medium">
            {{ __('login_unlock_more') }}
          </span>
        </div>
      </div>
    @endif
  </div>

  <div class="bg-white border rounded p-6 shadow mt-8">
    @if(!Auth::check())
      <h3 class="text-lg font-bold mb-3">{{ __('guest_guide') }}</h3>
      <ul class="list-disc list-inside text-gray-700 space-y-1">
        <li>{{ __('guest_guide_1') }}</li>
        <li>{{ __('guest_guide_2') }}</li>
        <li>{{ __('guest_guide_3') }}</li>
      </ul>
    @elseif(Auth::user()->role == 'user')
      <h3 class="text-lg font-bold mb-3">{{ __('user_features') }}</h3>
      <ul class="list-disc list-inside text-gray-700 space-y-1">
        <li>{{ __('user_features_1') }}</li>
        <li>{{ __('user_features_2') }}</li>
        <li>{{ __('user_features_3') }}</li>
      </ul>
    @elseif(Auth::user()->role == 'admin')
      <h3 class="text-lg font-bold mb-3">{{ __('admin_panel_overview') }}</h3>
      <ul class="list-disc list-inside text-gray-700 space-y-1">
        <li>{{ __('admin_overview_1') }}</li>
        <li>{{ __('admin_overview_2') }}</li>
        <li>{{ __('admin_overview_3') }}</li>
      </ul>
    @endif
  </div>
@endsection
