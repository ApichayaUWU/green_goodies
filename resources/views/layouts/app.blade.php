<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=manjari:700" rel="stylesheet" />
        <style>
        body {
            background-color: white !important; 
        
        }
    </style>
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

            <div class="min-h-screen">
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            </div>

            <!-- Footer -->
            <div>
            <footer class="bg-[#f7f0e8] w-full py-6 flex justify-around items-center">
                <!-- Logo and slogan -->
                <div class="flex flex-col items-center">

                    <img src="{{ asset('storage/' . 'images/กล้วยหอม.jpg') }}" alt="Green Goodies Logo" class="h-16 mb-2">
                    
                    <h1 class="text-green-600 text-2xl font-bold">Green Goodies</h1>
                    <p class="text-gray-600">Goodies Grown with Love</p>
                </div>
                
                <!-- Contact info -->
                <div class="flex flex-col items-center">
                    <h2 class="text-gray-800 font-semibold">Contact Us</h2>
                    <p class="text-gray-600">Tel: 099-999-9999</p>
                    <p class="text-gray-600">Email: greengoodies@gmail.com</p>
                </div>

                <!-- Social Media Icons -->
                <div class="flex flex-col items-center">
                    <h2 class="text-gray-800 font-semibold">Social Media</h2>
                    <div class="flex space-x-4 mt-2">
                        <a href="#"><img src="{{ asset('storage/' . 'images/facebook.png') }}" alt="Facebook" class="h-6 w-6" /></a>
                        <a href="#"><img src="{{ asset('storage/' . 'images/instagram.png') }}" alt="Instagram" class="h-6 w-6" /></a>
                        <a href="#"><img src="{{ asset('storage/' . 'images/twitter.png') }}" alt="Twitter" class="h-6 w-6" /></a>
                    </div>
                </div>
            </footer>
            </div>
        </div>
    </body>
</html>
