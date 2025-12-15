<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ __('brand') }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  @vite(['resources/css/app.css','resources/js/app.js', 'resources/js/functions1.js'])
  <script src="//unpkg.com/alpinejs" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ReadSpace</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-100">
    @if (session('throttle_error_message') && session('limit_reached'))
        <div class="limit-popup"
            style="
        position: fixed; 
        top: 25%; 
        left: 55%; 
        transform: translate(-50%, -50%);
        background-color: #ffebee;
        color: #b71c1c; 
        border: 2px solid #ef9a9a; 
        border-radius: 10px; 
        padding: 30px; 
        z-index: 9999; 
        box-shadow: 0 6px 12px rgba(0,0,0,.3);
        text-align: center;
        width: 80%;
        max-width: 450px;
    ">
            <h3 style="margin-top: 0; font-size: 1.5rem;">Access Denied</h3>
            <p style="font-size: 1.1rem; line-height: 1.4;">{{ session('throttle_error_message') }}</p>

            <a href="{{ route('login') }}"
                style="
            display: inline-block; 
            padding: 12px 25px; 
            margin-top: 20px;
            background-color: #c62828; 
            color: white; 
            text-decoration: none; 
            font-weight: bold;
            border-radius: 6px;
            transition: background-color 0.2s;
        "
                onmouseover="this.style.backgroundColor='#d32f2f'" onmouseout="this.style.backgroundColor='#c62828'">
                Log In Now
            </a>

            <button onclick="this.closest('.limit-popup').remove()"
                style="
            background: none;
            border: none;
            color: #b71c1c; 
            cursor: pointer;
            font-size: 0.9rem;
            margin-top: 10px;
            display: block;
            width: 100%;
        ">
            Dismiss
        </button>
    </div>
@endif
@if (session('favorite_limit_error'))
    <div class="favorite-limit-popup" style="
                Dismiss
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="favorite-limit-popup"
            style="
        position: fixed; 
        top: 25%; 
        left: 55%; 
        transform: translate(-50%, -50%); 
        background-color: #ffebee; 
        color: #b71c1c; 
        border: 2px solid #ef9a9a; 
        border-radius: 10px; 
        padding: 30px; 
        z-index: 9999; 
        box-shadow: 0 6px 12px rgba(0,0,0,.3);
        text-align: center;
        width: 80%;
        max-width: 450px;
    ">
        <h3 style="margin-top: 0; font-size: 1.5rem;">Favorite Limit Reached</h3>
        
        <p style="font-size: 1.1rem; line-height: 1.4;">{{ session('favorite_limit_error') }}</p>
            <h3 style="margin-top: 0; font-size: 1.5rem;">Favorite Limit Reached</h3>

            <p style="font-size: 1.1rem; line-height: 1.4;">{{ session('error') }}</p>

            <button onclick="this.closest('.favorite-limit-popup').remove()"
                style="
            background-color: #c62828; 
            color: white; 
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 6px;
            transition: background-color 0.2s;
        " onmouseover="this.style.backgroundColor='#d32f2f'" onmouseout="this.style.backgroundColor='#c62828'">
            Close
        </button>
    </div>
@endif
@if (session('favorite_status'))
    <div class="favorite-success-popup" style="
        position: fixed; 
        top: 25%; 
        left: 55%; 
        transform: translate(-50%, -50%); 
        background-color: #e8f5e9; 
        color: #1b5e20; 
        border: 2px solid #a5d6a7; 
        border-radius: 10px; 
        padding: 30px; 
        z-index: 9999; 
        box-shadow: 0 6px 12px rgba(0,0,0,.3);
        text-align: center;
        width: 80%;
        max-width: 450px;
    ">
        <h3 style="margin-top: 0; font-size: 1.5rem;">Success</h3>
        
        <p style="font-size: 1.1rem; line-height: 1.4;">{{ session('favorite_status') }}</p>

        <button onclick="this.closest('.favorite-success-popup').remove()" style="
            background-color: #2e7d32; 
            color: white; 
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 6px;
            transition: background-color 0.2s;
        " onmouseover="this.style.backgroundColor='#388e3c'" onmouseout="this.style.backgroundColor='#2e7d32'">
            Dismiss
        </button>
    </div>
@endif


<div x-data="{ sidebarOpen: true, profileOpen: false }" class="flex min-h-screen">

  <aside
    class="bg-white shadow-md transition-all duration-300"
    :class="sidebarOpen ? 'w-64' : 'w-0 overflow-hidden'"
  >
    <div class="px-6 py-4 text-lg font-bold border-b">{{ __('brand') }}</div>

    <nav class="p-4 space-y-2">
      <a href="{{ route('home') }}" class="block px-4 py-2 rounded hover:bg-slate-100">{{ __('home') }}</a>

      <hr class="my-2">

      <div class="px-4 py-2 text-xs uppercase text-gray-500 font-semibold tracking-wide">
        {{ __('features') }}
      </div>

      <div x-data="{ open: false }">
        <button
          @click="open = !open"
          class="w-full flex justify-between items-center px-4 py-2 rounded hover:bg-slate-100"
        >
          <span>{{ __('all_books') }}</span>
          <span x-text="open ? '▴' : '▾'"></span>
        </button>

        <div x-show="open" x-transition class="ml-4 mt-1 space-y-1">
          <a href="{{ route('books.index') }}" class="block px-4 py-2 rounded hover:bg-slate-100">{{ __('view_books') }}</a>

          @auth
            @if(auth()->user()->role === 'admin')
              <a href="{{ route('admin.books.create') }}" class="block px-4 py-2 rounded hover:bg-slate-100">{{ __('add_book') }}</a>
            @endif
          @endauth
        "
                onmouseover="this.style.backgroundColor='#d32f2f'" onmouseout="this.style.backgroundColor='#c62828'">
                Close
            </button>
        </div>
    @endif

      <a href="{{ route('categories.index') }}" class="block px-4 py-2 rounded hover:bg-slate-100">
        {{ __('categories') }}
      </a>

      @auth
        <a href="{{ route('favorites.index') }}" class="block px-4 py-2 rounded hover:bg-slate-100">
          {{ __('favorite_books') }}
        </a>
      @else
        <span
          class="block px-4 py-2 rounded text-gray-400 cursor-not-allowed"
          title="{{ __('login_required_favorites') }}"
        >
          {{ __('favorite_books') }}
        </span>
      @endauth

    <div x-data="{ sidebarOpen: true, profileOpen: false }" class="flex min-h-screen">

          <div class="px-4 py-2 text-xs uppercase text-gray-500 font-semibold tracking-wide">
            {{ __('admin_panel') }}
          </div>

          <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 rounded hover:bg-slate-100">
            {{ __('user_management') }}
          </a>
          <a href="{{ route('admin.activity.index') }}" 
            class="block px-4 py-2 rounded hover:bg-slate-100">
            Activity Log
          </a>
        @endif
      @endauth
    </nav>
  </aside>
        <aside class="bg-white shadow-md transition-all duration-300"
            :class="sidebarOpen ? 'w-64' : 'w-0 overflow-hidden'">
            {{-- <div class="px-6 py-4 text-lg font-bold border-b">ReadSpace</div> --}}
            <div class="px-6 py-4 text-lg font-bold border-b flex items-center gap-3">
                <img src="storage/ReadSpaceLogo.png" alt="ReadSpace Logo" class="h-10 w-10 object-contain">
                <span>Read<span class="text-green-700">Space</span></span>

            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-2 rounded hover:bg-slate-100">Home</a>

                <hr class="my-2">

                <div class="px-4 py-2 text-xs uppercase text-gray-500 font-semibold tracking-wide">
                    Features
                </div>

      <div class="flex items-center gap-3">

        {{-- Language Switcher --}}
        @php($loc = app()->getLocale())
        <div class="flex items-center gap-2">
          <a href="{{ route('locale.switch', ['locale' => 'en']) }}"
             class="px-3 py-1 rounded border text-sm hover:bg-slate-100 {{ $loc === 'en' ? 'bg-slate-200 font-semibold' : '' }}">
            EN
          </a>
          <a href="{{ route('locale.switch', ['locale' => 'id']) }}"
             class="px-3 py-1 rounded border text-sm hover:bg-slate-100 {{ $loc === 'id' ? 'bg-slate-200 font-semibold' : '' }}">
            ID
          </a>
        </div>

        {{-- Profile Dropdown --}}
        <div class="relative" x-data="{ open: false }">
          @auth
            <button @click="open = !open"
              class="w-10 h-10 rounded-full bg-slate-800 text-white flex items-center justify-center">
              {{ strtoupper(substr(auth()->user()->name,0,1)) }}
            </button>

            <div
              x-show="open"
              @click.away="open = false"
              x-transition
              class="absolute right-0 mt-2 w-40 bg-white border shadow rounded"
            >
              <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-slate-100">
                {{ __('profile') }}
              </a>

              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left px-4 py-2 text-sm hover:bg-slate-100">
                  {{ __('sign_out') }}
                </button>
              </form>
            </div>
          @else
            <button @click="open = !open"
              class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
              G
            </button>

            <div
              x-show="open"
              @click.away="open = false"
              x-transition
              class="absolute right-0 mt-2 w-40 bg-white border shadow rounded"
            >
              <a href="{{ route('login') }}" class="block px-4 py-2 text-sm hover:bg-slate-100">
                {{ __('sign_in') }}
              </a>
            </div>
          @endauth
        </div>

      </div>
    </header>
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center px-4 py-2 rounded hover:bg-slate-100">
                        <span>All Books</span>
                        <span x-text="open ? '▴' : '▾'"></span>
                    </button>
                    <div x-show="open" x-transition class="ml-4 mt-1 space-y-1">
                        <a href="{{ route('books.index') }}" class="block px-4 py-2 rounded hover:bg-slate-100">View
                            Books</a>
                        @auth
                            @if (auth()->user()->role === 'admin')
                                <a href="{{ route('admin.books.create') }}"
                                    class="block px-4 py-2 rounded hover:bg-slate-100">Add Book</a>
                            @endif
                        @endauth
                    </div>
                </div>

                <a href="{{ route('categories.index') }}" class="block px-4 py-2 rounded hover:bg-slate-100">
                    Categories
                </a>

                @auth
                    <a href="{{ route('favorites.index') }}" class="block px-4 py-2 rounded hover:bg-slate-100">
                        Favorite Book
                    </a>
                @else
                    <span class="block px-4 py-2 rounded text-gray-400 cursor-not-allowed"
                        title="Login required to access favorite books">
                        Favorite Book
                    </span>
                @endauth

                @auth
                    @if (auth()->user()->role === 'admin')
                        <hr class="my-2">

                        <div class="px-4 py-2 text-xs uppercase text-gray-500 font-semibold tracking-wide">
                            Admin Panel
                        </div>

                        <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 rounded hover:bg-slate-100">
                            User Management
                        </a>
                        <a href="{{ route('admin.activity.index') }}" class="block px-4 py-2 rounded hover:bg-slate-100">
                            Activity Log
                        </a>
                    @endif
                @endauth
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">

            <header class="bg-white shadow px-6 py-4 flex justify-between items-center relative">
                <button @click="sidebarOpen = !sidebarOpen" class="text-2xl">&#9776;</button>

                <div class="relative" x-data="{ open: false }">
                    @auth
                        <button @click="open = !open"
                            class="w-10 h-10 rounded-full bg-slate-800 text-white flex items-center justify-center">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </button>

                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-40 bg-white border shadow rounded">
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm hover:bg-slate-100">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="w-full text-left px-4 py-2 text-sm hover:bg-slate-100">Sign Out</button>
                            </form>
                        </div>
                    @else
                        <button @click="open = !open"
                            class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">G</button>
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-40 bg-white border shadow rounded">
                            <button
                                class="block w-full text-left px-4 py-2 text-sm text-gray-400 cursor-not-allowed">Profile</button>
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm hover:bg-slate-100">Sign In</a>
                        </div>
                    @endauth
                </div>
            </header>

            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
