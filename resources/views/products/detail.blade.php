<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold">Product Details</h3>
                    <p><strong>Name:</strong> {{ $product->name }}</p>
                    <p><strong>Category:</strong> {{ $product->category->name ?? 'Uncategorized' }}</p>
                    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                    <p><strong>Stock:</strong> {{ $product->stock_quantity }}</p>
                    <p><strong>Description:</strong> {{ $product->description }}</p>

                    @if($product->image)
                        <div>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="mt-4 w-32 h-32 object-cover">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
