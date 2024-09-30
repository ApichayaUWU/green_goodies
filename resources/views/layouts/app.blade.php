<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <style>
        /* Remove bottom margin/padding to ensure no space between content and footer */
        .no-gap {
            margin-bottom: 0 !important;
            padding-bottom: 20px !important;
        }

        /* General CSS reset for margin and padding */
        body, main, footer, div, header {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Flexbox layout to ensure footer stays at the bottom */
        .min-h-screen {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
    </style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manjari:700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-[#EADAB3] w-full py-6 no-gap">
            <div class="flex justify-center items-center">
                <div class="max-w-7xl w-full px-4 flex justify-between items-center">
                    <!-- Logo and slogan -->
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('storage/images/logo.png') }}" alt="Green Goodies Logo" style="height: 90px; width: auto;">
                    </div>

                    <!-- Contact info -->
                    <div class="flex flex-col text-left">
                        <p class="text-gray-800 font-semibold">Contact Us</p>
                        <p class="text-gray-600">
                            Tel: 099-999-9999<br>
                            Email: greengoodies@gmail.com
                        </p>
                    </div>

                    <!-- Social Media Icons -->
                    <div class="flex flex-col items-center">
                        <h2 class="text-gray-800 font-semibold">Social Media</h2>
                        <div class="flex space-x-4 mt-2">
                            <img src="{{ asset('storage/images/socialmedia.png') }}" alt="Social Media Icons" style="height: 40px; width: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
