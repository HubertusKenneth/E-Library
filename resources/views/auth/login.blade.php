<x-guest-layout>
    <div class="flex justify-center mt-6">
        <img class="w-20 h-20 fill-current text-gray-500" src="{{ asset('storage/ReadSpaceLogo.png') }}"
            alt="ReadSpace Logo"
            class="h-10 w-10 object-contain">

    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2 class="text-2xl font-bold text-center mb-6">
        {{ __('sign_in') }}
    </h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('email')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('password')" />

            <div class="relative">
                <x-text-input
                    id="password"
                    class="block mt-1 w-full pr-10"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                />

                <button
                    type="button"
                    id="togglePassword"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700"
                >
                    <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.458 12C3.732 7.943 7.522 5
                                12 5c4.478 0 8.268 2.943
                                9.542 7-1.274 4.057-5.064
                                7-9.542 7-4.478 0-8.268-2.943-9.542-7z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 11-6 0
                                3 3 0 016 0z"/>
                        <line x1="3" y1="21" x2="21" y2="3"
                            stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" class="w-5 h-5 hidden">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.458 12C3.732 7.943 7.522 5
                                12 5c4.478 0 8.268 2.943
                                9.542 7-1.274 4.057-5.064
                                7-9.542 7-4.478 0-8.268-2.943-9.542-7z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 11-6 0
                                3 3 0 016 0z"/>
                    </svg>
                </button>

            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                >
                <span class="ms-2 text-sm text-gray-600">
                    {{ __('remember_me') }}
                </span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-gray-900"
                   href="{{ route('password.request') }}">
                    {{ __('forgot_password') }}
                </a>
            @endif
        </div>

        <div class="flex justify-center mt-6">
            <x-primary-button>
                {{ __('sign_in') }}
            </x-primary-button>
        </div>
    </form>

    <div class="flex flex-col items-center justify-center mt-6 space-y-2">
        <div>
            <span class="text-sm text-gray-600">
                {{ __('dont_have_account') }}
            </span>
            <a href="{{ route('register') }}"
               class="ml-2 text-sm text-indigo-600 hover:text-indigo-900 font-semibold">
                {{ __('register_here') }}
            </a>
        </div>

        <a href="{{ url('/') }}"
           class="text-sm text-gray-600 hover:text-gray-900 font-semibold">
            {{ __('back_to_home') }}
        </a>
    </div>
</x-guest-layout>
