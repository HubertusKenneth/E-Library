<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ __('brand') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/functions1.js'])

    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-100">

    @if (session('alert'))
        <div id="alertBox"
            class="fixed top-0 left-1/2 -translate-x-1/2
                  z-50 px-6 py-3 mt-4 rounded shadow-lg text-white
                  transform -translate-y-full opacity-0
                  transition-all duration-500 ease-out
                  {{ session('alert.type') === 'add' ? 'bg-green-600' : 'bg-red-600' }}">
            {{ session('alert.message') }}
        </div>
    @endif




    @if (session('throttle_error_message') && session('limit_reached'))
        <div class="limit-popup"
            style="
            position: fixed; top: 25%; left: 50%; transform: translate(-50%, -50%);
            background-color: #ffebee; color: #b71c1c; border: 2px solid #ef9a9a;
            border-radius: 10px; padding: 30px; z-index: 9999; box-shadow: 0 6px 12px rgba(0,0,0,.3);
            text-align: center; width: 80%; max-width: 450px;">

            <h3 style="margin-top: 0; font-size: 1.5rem;">
                {{ __('popup.access_denied.title') }}
            </h3>

            <p style="font-size: 1.1rem; line-height: 1.4;">
                {{ __('popup.access_denied.message') }}
            </p>

            <a href="{{ route('login') }}"
                style="
                display: inline-block; padding: 12px 25px; margin-top: 20px;
                background-color: #c62828; color: white; text-decoration: none;
                font-weight: bold; border-radius: 6px; transition: background-color 0.2s;"
                onmouseover="this.style.backgroundColor='#d32f2f'"
                onmouseout="this.style.backgroundColor='#c62828'">
                {{ __('popup.access_denied.login_now') }}
            </a>

            <button onclick="this.closest('.limit-popup').remove()"
                style="
                background: none; border: none; color: #b71c1c; cursor: pointer;
                font-size: 0.9rem; margin-top: 10px; display: block; width: 100%;">
                {{ __('popup.access_denied.dismiss') }}
            </button>
        </div>
    @endif


 @if (session('favorite_limit_error'))
        <div class="favorite-limit-popup"
            style="
            position: fixed; top: 25%; left: 50%; transform: translate(-50%, -50%);
            background-color: #ffebee; color: #b71c1c; border: 2px solid #ef9a9a;
            border-radius: 10px; padding: 30px; z-index: 9999;
            box-shadow: 0 6px 12px rgba(0,0,0,.3);
            text-align: center; width: 80%; max-width: 450px;">

            <h3 style="margin-top: 0; font-size: 1.5rem;">
                {{ __('popup.favorite_limit.title') }}
            </h3>

            <p style="font-size: 1.1rem; line-height: 1.4;">
                {{ session('favorite_limit_error') }}
            </p>

            <button onclick="this.closest('.favorite-limit-popup').remove()"
                style="
                background-color: #c62828; color: white; border: none;
                padding: 10px 20px; margin-top: 20px; cursor: pointer;
                font-weight: bold; border-radius: 6px;">
                {{ __('popup.access_denied.dismiss') }}
            </button>
        </div>
    @endif

 @if (session('favorite_status'))
        <div class="favorite-success-popup"
            style="
            position: fixed; top: 25%; left: 50%; transform: translate(-50%, -50%);
            background-color: #e8f5e9; color: #1b5e20; border: 2px solid #a5d6a7;
            border-radius: 10px; padding: 30px; z-index: 9999;
            box-shadow: 0 6px 12px rgba(0,0,0,.3);
            text-align: center; width: 80%; max-width: 450px;">

            <h3 style="margin-top: 0; font-size: 1.5rem;">
                {{ __('popup.favorite_success.title') }}
            </h3>

            <p style="font-size: 1.1rem; line-height: 1.4;">
                {{ session('favorite_status') }}
            </p>

            <button onclick="this.closest('.favorite-success-popup').remove()"
                style="
                background-color: #2e7d32; color: white; border: none;
                padding: 10px 20px; margin-top: 20px; cursor: pointer;
                font-weight: bold; border-radius: 6px;">
                {{ __('popup.access_denied.dismiss') }}
            </button>
        </div>
    @endif

    <div x-data="{ sidebarOpen: true }" class="flex min-h-screen">

        <aside class="bg-white shadow-md transition-all duration-300 flex flex-col"
            :class="sidebarOpen ? 'w-64' : 'w-0 overflow-hidden'">
            <div class="px-6 py-4 text-lg font-bold border-b flex items-center gap-3">
                <img src="{{ asset('storage/ReadSpaceLogo.png') }}" alt="ReadSpace Logo"
                    class="h-10 w-10 object-contain">

                <span>Read<span class="text-green-700">Space</span></span>
            </div>

            <nav class="p-4 space-y-2 flex-1">

                <a href="{{ route('home') }}"
                    class="block px-4 py-2 rounded hover:bg-slate-100">{{ __('home') }}</a>
                <hr class="my-2">

                <div class="px-4 py-2 text-xs uppercase text-gray-500 font-semibold tracking-wide">{{ __('features') }}
                </div>

                <div x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center px-4 py-2 rounded hover:bg-slate-100">
                        <span>{{ __('all_books') }}</span>
                        <span x-text="open ? '▴' : '▾'"></span>
                    </button>
                    <div x-show="open" x-transition class="ml-4 mt-1 space-y-1">
                        <a href="{{ route('books.index') }}"
                            class="block px-4 py-2 rounded hover:bg-slate-100">{{ __('view_books') }}</a>
                        @auth
                            @if (auth()->user()->isAdmin())
                                <a href="{{ route('admin.books.create') }}"
                                    class="block px-4 py-2 rounded hover:bg-slate-100">{{ __('add_book') }}</a>
                            @endif
                        @endauth
                    </div>
                </div>

                <a href="{{ route('categories.index') }}"
                    class="block px-4 py-2 rounded hover:bg-slate-100">{{ __('categories') }}</a>

                @auth
                    <a href="{{ route('favorites.index') }}"
                        class="block px-4 py-2 rounded hover:bg-slate-100">{{ __('favorite_books') }}</a>
                @else
                    <span class="block px-4 py-2 rounded text-gray-400 cursor-not-allowed"
                        title="{{ __('login_required_favorites') }}">{{ __('favorite_books') }}</span>
                @endauth



                @auth
                    @if (auth()->user()->isAdmin())
                        <hr class="my-2">
                        <div class="px-4 py-2 text-xs uppercase text-gray-500 font-semibold tracking-wide">
                            {{ __('admin_panel') }}</div>
                        <a href="{{ route('admin.users.index') }}"
                            class="block px-4 py-2 rounded hover:bg-slate-100">{{ __('user_management') }}</a>
                        <a href="{{ route('admin.activity.index') }}" class="block px-4 py-2 rounded hover:bg-slate-100">
                            {{ __('activity_log') }}</a>
                    @endif
                @endauth

                <a href="{{ route('about') }}" class="block px-4 py-2 rounded hover:bg-slate-100">
                    {{ __('about_us') }}
                </a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col h-screen">
            <header class="bg-white shadow px-6 py-4 flex justify-between items-center relative">
                <button @click="sidebarOpen = !sidebarOpen" class="text-2xl">&#9776;</button>

                <div class="flex items-center gap-3">

                    @php($loc = app()->getLocale())
                    <div class="flex items-center gap-2">
                        <a href="{{ route('locale.switch', ['locale' => 'en']) }}"
                            class="px-3 py-1 rounded border text-sm hover:bg-slate-100 {{ $loc === 'en' ? 'bg-slate-200 font-semibold' : '' }}">EN</a>
                        <a href="{{ route('locale.switch', ['locale' => 'id']) }}"
                            class="px-3 py-1 rounded border text-sm hover:bg-slate-100 {{ $loc === 'id' ? 'bg-slate-200 font-semibold' : '' }}">ID</a>
                    </div>

                    <div class="relative" x-data="{ open: false }">
                        @auth
                            <button @click="open = !open"
                                class="w-10 h-10 rounded-full bg-slate-800 text-white flex items-center justify-center">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</button>
                            <div x-show="open" @click.away="open = false" x-transition
                                class="absolute right-0 mt-2 w-40 bg-white border shadow rounded">
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-4 py-2 text-sm hover:bg-slate-100">{{ __('profile') }}</a>
                                <form method="POST" action="{{ route('logout') }}">@csrf<button
                                        class="w-full text-left px-4 py-2 text-sm hover:bg-slate-100">{{ __('sign_out') }}</button>
                                </form>
                            </div>
                        @else
                            <button @click="open = !open"
                                class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">G</button>
                            <div x-show="open" @click.away="open = false" x-transition
                                class="absolute right-0 mt-2 w-40 bg-white border shadow rounded">
                                <a href="{{ route('login') }}"
                                    class="block px-4 py-2 text-sm hover:bg-slate-100">{{ __('sign_in') }}</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6 overflow-y-auto">
                @yield('content')
            </main>

            <footer class="bg-white border-t text-center text-sm text-gray-600 py-3">
                © {{ date('Y') }} ReadSpace.
            </footer>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
