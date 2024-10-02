<x-guest-layout>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manjari:700" rel="stylesheet" />
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <style>
        .custom-input {
            border: 2px solid #ccc; /* Default border color */
            transition: border-color 0.3s; /* Smooth transition for border color */
        }

        .custom-input:focus {
            border-color: #ACE094; /* Change to your desired color on focus */
            outline: none; /* Remove default outline */
        }

        .register {
            text-decoration: underline; /* Underline for link */
            color: #4A5568; /* Link color */
            transition: color 0.3s; /* Smooth transition for color */
        }

        .register:hover {
            color: #2B6CB0; /* Change color on hover */
        }
        .if{
            padding-left: 60px;
            padding-top: 10px;
        }
    </style>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="custom-input block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="custom-input block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    
    <div class="text-sm if">If you don't have an account, please <a href="{{ route('register') }}" class="register">register</a>.</div>

</x-guest-layout>
