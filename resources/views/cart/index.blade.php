<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Cart
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($cartItems->isEmpty())
                        <p>Your cart is empty.</p>
                    @else
                        <table class="min-w-full border-collapse border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2">Image</th>
                                    <th class="border border-gray-300 px-4 py-2">Product</th>
                                    <th class="border border-gray-300 px-4 py-2">Quantity</th>
                                    <th class="border border-gray-300 px-4 py-2">Price</th>
                                    <th class="border border-gray-300 px-4 py-2">Total</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $cartItem)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <img src="{{ asset('storage/' . $cartItem->product->image) }}" 
                                                alt="{{ $cartItem->product->name }}" 
                                                class="mt-4 w-32 h-32 object-cover">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $cartItem->product->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <div class="flex flex-row gap-4">
                                                <!-- Include Quantity Input Blade Component -->
                                                <x-quantity-input :quantity="$cartItem->quantity" />
                                            </div>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            ${{ number_format($cartItem->product->price, 2) }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2 item-total-price">
                                            ${{ number_format($cartItem->product->price * $cartItem->quantity, 2) }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            <strong>Total Amount: 
                                <span class="total-amount">
                                    ${{ number_format($cartItems->sum(function($item) {
                                        return $item->product->price * $item->quantity;
                                    }), 2) }}
                                </span>
                            </strong>
                        </div>

                        <div class="mt-4">
                            <a href="" class="bg-blue-500 text-white px-4 py-2 rounded">Checkout</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch cart data from Laravel (as JSON object)
            const cartItems = @json($cartItems);

            // Get all necessary DOM elements
            const decrementButtons = document.querySelectorAll('[data-input-counter-decrement="quantity-input"]');
            const incrementButtons = document.querySelectorAll('[data-input-counter-increment="quantity-input"]');
            const quantityInputs = document.querySelectorAll('[data-input-counter]');
            const itemTotalPrices = document.querySelectorAll('.item-total-price');
            const totalAmountElement = document.querySelector('.total-amount'); // Element for grand total amount

            // Function to update the total price for each item
            const updateTotalPrice = function(index) {
                const quantity = parseInt(quantityInputs[index].value) || 0;
                const pricePerUnit = parseFloat(cartItems[index].product.price);
                const totalPrice = pricePerUnit * quantity;

                // Update the item's total price
                itemTotalPrices[index].innerText = `$${totalPrice.toFixed(2)}`;

                // Update the grand total
                updateGrandTotal();
            };

            // Function to calculate the grand total
            const updateGrandTotal = function() {
                let grandTotal = 0;
                itemTotalPrices.forEach((itemTotal, index) => {
                    const price = parseFloat(itemTotal.innerText.replace('$', ''));
                    grandTotal += price;
                });

                // Update the grand total element
                totalAmountElement.innerText = `$${grandTotal.toFixed(2)}`;
            };

            // Attach event listeners for decrement buttons
            decrementButtons.forEach((button, index) => {
                button.addEventListener('click', function() {
                    let value = parseInt(quantityInputs[index].value) || 0;
                    if (value > 0) {
                        quantityInputs[index].value = value - 1;
                        updateTotalPrice(index);
                    }
                });
            });

            // Attach event listeners for increment buttons
            incrementButtons.forEach((button, index) => {
                button.addEventListener('click', function() {
                    let value = parseInt(quantityInputs[index].value) || 0;
                    const maxStock = cartItems[index].product.stock_quantity;
                    if (value < maxStock) {
                        quantityInputs[index].value = value + 1;
                        updateTotalPrice(index);
                    }
                });
            });

            // Attach event listeners for direct input changes
            quantityInputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    let value = parseInt(input.value) || 0;
                    const maxStock = cartItems[index].product.stock_quantity;
                    if (value > maxStock) {
                        input.value = maxStock;
                    } else if (value < 0) {
                        input.value = 0;
                    }
                    updateTotalPrice(index);
                });
            });
        });
    </script>
</x-app-layout>
