<x-guest-layout>
    <div class="flex justify-center mt-6">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                          :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full pr-10"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />

                <button type="button" id="togglePassword"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.98 8.223a10.477 10.477 0 00-.716 3.777 10.477 10.477 0 00.716 3.777m16.04-7.554a10.477 10.477 0 01.716 3.777 10.477 10.477 0 01-.716 3.777M6.228 6.228a10.45 10.45 0 0111.544 0m-11.544 0L4.5 4.5m13.272 1.728L19.5 4.5m-1.728 1.728L4.5 19.5m0 0l1.728-1.728m0 0a10.45 10.45 0 0011.544 0m-11.544 0A10.45 10.45 0 014.5 19.5z" />
                    </svg>

                    <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         class="w-5 h-5 hidden">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                       name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-gray-900"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="flex justify-center mt-6">
            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <div class="flex flex-col items-center justify-center mt-6 space-y-2">
        <div>
            <span class="text-sm text-gray-600">Don't have an account?</span>
            <a href="{{ route('register') }}"
               class="ml-2 text-sm text-indigo-600 hover:text-indigo-900 font-semibold">
                Register here
            </a>
        </div>

        <a href="{{ url('/') }}"
           class="text-sm text-gray-600 hover:text-gray-900 font-semibold">
            Back to Home
        </a>
    </div>

</x-guest-layout>
