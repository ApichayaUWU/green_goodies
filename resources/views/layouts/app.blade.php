<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
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

        <div class="min-h-screen">
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- Footer -->
        <div>
            <footer class="bg-[#FFFFFF] w-full py-6 flex justify-around items-center">
                <!-- Logo and slogan -->
                <div class="flex flex-col items-center" style="height: 30px;">
                    <img src="{{ asset('storage/images/logo.png') }}" alt="Green Goodies Logo" >
                </div>
                
<!-- Contact info -->
<div class="flex flex-col">
    <p class="text-gray-800 font-semibold">Contact Us</p>
    <p class="text-gray-600" style="padding-left: 30px;">
        Tel: 099-999-9999<br>
        Email: greengoodies@gmail.com
    </p>
</div>


                <!-- Social Media Icons -->
                <div class="flex flex-col items-center">
                    <h2 class="text-gray-800 font-semibold">Social Media</h2>
                    <div class="flex space-x-4 mt-2 " style="height: 30px;" >
                        <img src="{{ asset('storage/images/socialmedia.png') }}">
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
