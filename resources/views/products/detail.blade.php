<x-app-layout>
    <style>
    body {
        background-color: white !important;
    }

    .card {
        max-width: 300px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #EFEFEF;
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

    .imgProduct {
        border: 15px solid #C4B590;
        border-radius: 30px;
        height: 362px;
        width: 417px;
    }

    .DetailProduct {
        width: 661px;
    }

    /* .wishlist {
        margin-top: 8px;
    } */
    </style>

    <div class="brownBg pt-6 pb-3 flex flex-row flex-wrap justify-center">
        <h2 class="font-semibold text-4xl leading-tight">
            {{ __('Product Details') }}
        </h2>
    </div>


    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 flex flex-row justify-center">
            <div class="px-10">
                @if($product->image)
                <div>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="imgProduct mt-4 mb-4 object-cover">
                </div>
                @else
                <p>No image available</p>
                @endif
            </div>
            <div class="px-10 DetailProduct mt-4 mb-4 ">
                <p class="text-3xl textColor">{{ $product->name }}</p>
                <p class="text-2xl textColor py-5"> ${{ number_format($product->price, 2) }}</p>
                <svg width="661" height="2" viewBox="0 0 661 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="-8.74228e-08" y1="1" x2="661" y2="0.999942" stroke="#8A8A8A" stroke-width="2" />
                </svg>
                <p class="pt-5">{{ $product->description }}</p>
                <p class="pt-5 text-xl"><strong>in stock:</strong> {{ $product->stock_quantity }}</p>
                
                @if($product->stock_quantity > 0)

                <div class="flex flex-row gap-4 py-6">
                    <!-- Add to Cart Form -->
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <div class="flex flex-row gap-4">
                            <!-- Include Quantity Input Blade Component -->
                            <x-quantity-input />

                            <x-add-to-cart />

                        </div>
                    </form>
                    <div class="mt-4"><x-heart-btn :productId="$product->id" :isWished="$product->isWished" /></div>
                </div>
                @else
                <div class="bg-[#b95846] text-center w-[180px] rounded-[20px] my-10">
                    <p class="pt-5 text-xl text-white p-2"><strong>- Sold out. -</strong></p>

                </div>
                @endif
            </div>
        </div>
    </div>



    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the decrement button, increment button, and quantity input
        const decrementButton = document.querySelector('[data-input-counter-decrement="quantity-input"]');
        const incrementButton = document.querySelector('[data-input-counter-increment="quantity-input"]');
        const quantityInput = document.querySelector('[data-input-counter]');

        const maxStock = {{ $product->stock_quantity ? $product->stock_quantity : 0 }};
        // Replace with your actual stock value if needed

        // Function to update the quantity
        const updateQuantity = (newQuantity) => {
            const currentQuantity = parseInt(quantityInput.value) || 0;
            if (newQuantity <= 0) {
                quantityInput.value = 1; // Minimum quantity is 1
            } else if (newQuantity > maxStock) {
                quantityInput.value = maxStock; // Limit by the max stock available
            } else {
                quantityInput.value = newQuantity; // Update the quantity value
            }
        };

        // Event listener for decrement button
        decrementButton.addEventListener('click', function() {
            const currentQuantity = parseInt(quantityInput.value) || 1;
            updateQuantity(currentQuantity - 1);
        });

        // Event listener for increment button
        incrementButton.addEventListener('click', function() {
            const currentQuantity = parseInt(quantityInput.value) || 1;
            updateQuantity(currentQuantity + 1);
        });

        // Ensure input is within limits when manually typed
        quantityInput.addEventListener('input', function() {
            const currentQuantity = parseInt(quantityInput.value) || 1;
            updateQuantity(currentQuantity);
        });
    });
    </script>
</x-app-layout>