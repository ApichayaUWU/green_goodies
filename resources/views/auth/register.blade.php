<x-guest-layout>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manjari:700" rel="stylesheet" />
    
    <style>
        /* Custom styles for input fields */
        .custom-input {
            border: 2px solid #ccc; /* Default border color */
            transition: border-color 0.3s; /* Smooth transition for border color */
        }

        .custom-input:focus {
            border-color: #ACE094; /* Change to your desired color on focus */
            outline: none; /* Remove default outline */
        }
        .login {
            text-decoration: underline; /* Underline for link */
            color: #4A5568; /* Link color */
            transition: color 0.3s; /* Smooth transition for color */
        }

        .login:hover {
            color: #2B6CB0; /* Change color on hover */
        }
        .if{
            padding-left: 90px;
            padding-top: 20px;
        }
    </style>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="custom-input block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="custom-input block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="custom-input block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="custom-input block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <div class="text-sm if">If you have an account, please <a href="{{ route('login') }}" class="login">log in</a>.</div>
</x-guest-layout>
