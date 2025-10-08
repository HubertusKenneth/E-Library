<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>E-Library</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100">
<div x-data="{ sidebarOpen: true, profileOpen: false }" class="flex min-h-screen">

  <aside 
    class="bg-white shadow-md transition-all duration-300"
    :class="sidebarOpen ? 'w-64' : 'w-0 overflow-hidden'"
  >
    <div class="px-6 py-4 text-lg font-bold border-b">E-Library</div>
    <nav class="p-4 space-y-2">
      <a href="{{ route('home') }}" class="block px-4 py-2 rounded hover:bg-slate-100">Home</a>

      <hr class="my-2">

      <div class="px-4 py-2 text-xs uppercase text-gray-500 font-semibold tracking-wide">
        Features
      </div>

      <div x-data="{ open: false }">
        <button 
          @click="open = !open" 
          class="w-full flex justify-between items-center px-4 py-2 rounded hover:bg-slate-100"
        >
          <span>All Books</span>
          <span x-text="open ? '▴' : '▾'"></span>
        </button>
        <div x-show="open" x-transition class="ml-4 mt-1 space-y-1">
          <a href="{{ route('books.index') }}" class="block px-4 py-2 rounded hover:bg-slate-100">View Books</a>
          @auth
            @if(auth()->user()->role === 'admin')
              <a href="{{ route('admin.books.create') }}" class="block px-4 py-2 rounded hover:bg-slate-100">Add Book</a>
            @endif
          @endauth
        </div>
      </div>

      <span 
        class="block px-4 py-2 rounded text-gray-400 cursor-not-allowed"
        title=""
      >
        Categories
      </span>
      
      @auth
        <a href="{{ route('favorites.index') }}" 
           class="block px-4 py-2 rounded hover:bg-slate-100">
            Favorite Book
        </a>
      @else
        <span 
            class="block px-4 py-2 rounded text-gray-400 cursor-not-allowed"
            title="Login required to access favorite books"
        >
            Favorite Book
        </span>
      @endauth

      @auth
        @if(auth()->user()->role === 'admin')
          <hr class="my-2">

          <div class="px-4 py-2 text-xs uppercase text-gray-500 font-semibold tracking-wide">
            Admin Panel
          </div>

          <a href="{{ route('admin.users.index') }}" 
            class="block px-4 py-2 rounded hover:bg-slate-100">
            User Management
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
          <button @click="open = !open" class="w-10 h-10 rounded-full bg-slate-800 text-white flex items-center justify-center">
            {{ strtoupper(substr(auth()->user()->name,0,1)) }}
          </button>

          <div 
            x-show="open" 
            @click.away="open = false"
            x-transition 
            class="absolute right-0 mt-2 w-40 bg-white border shadow rounded"
          >
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-slate-100">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="w-full text-left px-4 py-2 text-sm hover:bg-slate-100">Sign Out</button>
            </form>
          </div>
        @else
          <button @click="open = !open" class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">G</button>
          <div 
            x-show="open" 
            @click.away="open = false"
            x-transition 
            class="absolute right-0 mt-2 w-40 bg-white border shadow rounded"
          >
            <button class="block w-full text-left px-4 py-2 text-sm text-gray-400 cursor-not-allowed">Profile</button>
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
</body>
</html>
