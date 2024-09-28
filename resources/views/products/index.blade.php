<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Our Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($products->isEmpty())
                        <p>No products available at the moment.</p>
                    @else
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Image</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Category</th>
                                    <th class="px-4 py-2">Price</th>
                                    <th class="px-4 py-2">Stock</th>
                                    <th class="px-4 py-2">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="border-b cursor-pointer hover:bg-gray-100" onclick="window.location='{{ route('products.detail', $product->id) }}'">
                                        {{-- Product Image --}}
                                        <td class="px-4 py-2">
                                            @if($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover">
                                            @else
                                                <span>No image</span>
                                            @endif
                                        </td>
                                        
                                        {{-- Product Name --}}
                                        <td class="px-4 py-2">
                                            <a href="{{ route('products.detail', $product->id) }}" class="text-blue-600 hover:underline">
                                                {{ $product->name }}
                                            </a>
                                        </td>
                                        
                                        {{-- Product Category --}}
                                        <td class="px-4 py-2">
                                            <a href="{{ route('products.detail', $product->id) }}" class="text-blue-600 hover:underline">
                                                {{ $product->category->name ?? 'Uncategorized' }}
                                            </a>
                                        </td>
                                        
                                        {{-- Product Price --}}
                                        <td class="px-4 py-2">
                                            <a href="{{ route('products.detail', $product->id) }}" class="text-blue-600 hover:underline">
                                                ${{ number_format($product->price, 2) }}
                                            </a>
                                        </td>
                                        
                                        {{-- Stock Quantity --}}
                                        <td class="px-4 py-2">
                                            <a href="{{ route('products.detail', $product->id) }}" class="text-blue-600 hover:underline">
                                                {{ $product->stock_quantity }}
                                            </a>
                                        </td>
                                        
                                        {{-- Description --}}
                                        <td class="px-4 py-2">
                                            <a href="{{ route('products.detail', $product->id) }}" class="text-blue-600 hover:underline">
                                                {{ Str::limit($product->description, 50) }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
