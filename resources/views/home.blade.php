<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Green Goodies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">
                <x-primary-button>{{ __('Shop Now') }}</x-primary-button>
            </a>
           

            </div>
        </div>
    </div>
</x-app-layout>
