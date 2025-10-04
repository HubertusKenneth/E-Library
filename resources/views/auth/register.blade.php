<x-guest-layout>
    <div class="flex justify-center mt-6">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                          :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                          :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full pr-10"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />

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

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <div class="relative">
                <x-text-input id="password_confirmation" class="block mt-1 w-full pr-10"
                              type="password"
                              name="password_confirmation"
                              required autocomplete="new-password" />

                <button type="button" id="toggleConfirmPassword"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg id="eyeClosedConfirm" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.98 8.223a10.477 10.477 0 00-.716 3.777 10.477 10.477 0 00.716 3.777m16.04-7.554a10.477 10.477 0 01.716 3.777 10.477 10.477 0 01-.716 3.777M6.228 6.228a10.45 10.45 0 0111.544 0m-11.544 0L4.5 4.5m13.272 1.728L19.5 4.5m-1.728 1.728L4.5 19.5m0 0l1.728-1.728m0 0a10.45 10.45 0 0011.544 0m-11.544 0A10.45 10.45 0 014.5 19.5z" />
                    </svg>

                    <svg id="eyeOpenConfirm" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         class="w-5 h-5 hidden">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex justify-center mt-6">
            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <div class="flex justify-center mt-2">
            <a href="{{ route('login') }}"
               class="text-sm text-indigo-600 hover:text-indigo-900 font-semibold underline">
                Already registered?
            </a>
        </div>

        <div class="flex justify-center mt-6">
            <a href="{{ url('/') }}"
               class="text-sm text-gray-600 hover:text-gray-900 font-semibold">
                Back to Home
            </a>
        </div>
    </form>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const input = document.getElementById('password');
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClosed = document.getElementById('eyeClosed');
            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            eyeOpen.classList.toggle('hidden', !isHidden);
            eyeClosed.classList.toggle('hidden', isHidden);
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const input = document.getElementById('password_confirmation');
            const eyeOpen = document.getElementById('eyeOpenConfirm');
            const eyeClosed = document.getElementById('eyeClosedConfirm');
            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            eyeOpen.classList.toggle('hidden', !isHidden);
            eyeClosed.classList.toggle('hidden', isHidden);
        });
    </script>
</x-guest-layout>
