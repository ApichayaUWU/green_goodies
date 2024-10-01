<x-app-layout>
    <style>
    body {
        background-color: white !important;
    }

    .brownBg {
        background-color: #F4EDDC;
    }

    .textColor {
        color: #4C4343;
    }

    h2 {
        color: #4C4343;
    }
    </style>
    <div class="brownBg pt-6 pb-3 flex flex-row flex-wrap justify-center">
        <h2 class="font-semibold text-4xl leading-tight">

            {{ __('Our Products') }}
        </h2>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-3 text-gray-900">
            @if($products->isEmpty())
            <p>No products available at the moment.</p>
            @else
            <div class="flex flex-row flex-wrap justify-center">
                @foreach ($products as $product)
                <x-product-card :product="$product" :isHomePage="false" />
                @endforeach

            </div>
            @endif
            <div class="mx-10 my-10">
                {{ $products->links('pagination::tailwind') }}
            </div>
        </div>



</x-app-layout>