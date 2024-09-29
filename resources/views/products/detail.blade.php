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

                    <div class="flex flex-row gap-4 py-6">
                        <!-- Add to Cart Form -->
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <div class="flex flex-row gap-4">
                                <!-- Include Quantity Input Blade Component -->
                                <x-quantity-input />

                                <!-- Add to Cart Button -->
                                <x-primary-button type="submit">
                                    {{ __('ADD TO CART') }}
                                </x-primary-button>
                            </div>
                        </form>

                        <!-- Wish List Button -->
                        <x-secondary-button>{{ __('WISH LIST') }}</x-secondary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include SweetAlert2 from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Check if the session has a success message
        @if(session('success'))
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        // Quantity adjustment logic
        document.addEventListener('DOMContentLoaded', function() {
            const decrementButton = document.getElementById('decrement-button');
            const incrementButton = document.getElementById('increment-button');
            const quantityInput = document.getElementById('quantity-input');
            const maxStock = {{ $product->stock_quantity }}; // Maximum stock from the product

            decrementButton.addEventListener('click', function() {
                let value = parseInt(quantityInput.value) || 0;
                if (value > 0) {
                    quantityInput.value = value - 1;
                }
            });

            incrementButton.addEventListener('click', function() {
                let value = parseInt(quantityInput.value) || 0;
                if (value < maxStock) {
                    quantityInput.value = value + 1;
                }
            });

            quantityInput.addEventListener('input', function() {
                let value = parseInt(quantityInput.value) || 0;
                if (value > maxStock) {
                    quantityInput.value = maxStock;
                } else if (value < 0) {
                    quantityInput.value = 0;
                }
            });
        });
    </script>
</x-app-layout>
