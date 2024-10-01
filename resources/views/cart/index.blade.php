<x-app-layout>
    <div class="bg-white flex justify-center custom-margin2">
        <x-cart-header/>
    </div>
    
    <div>
        <div> 
            <div class="bg-white overflow-hidden shadow-sm">

                <div class="p-6 text-gray-900">
                    @if($cartItems->isEmpty())
                        <p>Your cart is empty.</p>
                    @else
                         <table class="min-w-full border-collapse mx-auto">
                                <div class="flex flex-row justify-center">
                                    <div class="text-2xl pl-4 pr-64 w-240">
                                        Product
                                    </div>
                                    <div class="text-2xl pl-64 pr-32 w-240">
                                        Price
                                    </div>
                                    <div class="text-2xl pl-14 pr-32 w-240">
                                        Quantity
                                    </div>
                                    <div class="text-2xl pl-20 pr-32 w-240">
                                        Total Price
                                    </div>
                                </div>
                            <div class="line"></div>
                            <tbody>
                                
                                @foreach($cartItems as $index => $cartItem) <!-- Add index for unique ID -->
                                    
                                    <div class="flex flex-row justify-center">
                                        <div>
                                            <img src="{{ asset('storage/' . $cartItem->product->image) }}" 
                                                alt="{{ $cartItem->product->name }}" 
                                                class="mt-4 w-32 h-32 object-cover img_border">
                                        </div>

                                        <div class="text-xl py-16 pl-4 pr-64 w-32">{{ $cartItem->product->name }}</div>

                                        <div class="text-xl py-16 pl-52 w-32">${{ number_format($cartItem->product->price, 2) }}</div>

                                        <div  class="text-xl py-14 pl-52">
                                            <div class="flex flex-row gap-4">   
                                                <!-- Include Quantity Input Blade Component -->
                                                <x-quantity-input :quantity="$cartItem->quantity" data-index="{{ $index }}" />
                                            </div>
                                        </div>

                                        <div class="text-xl py-16 pl-52 w-32 item-total-price" data-index="{{ $index }}"> 
                                            ${{ number_format($cartItem->product->price * $cartItem->quantity, 2) }}
                                        </div>

                                        <div class="text-xl py-16 pl-52 w-32">
                                            <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-cart-delete-btn/>
                                            </form>
                                        </div>
                                    </div>

                                    @if(!$loop->last)
                                        <div class="line2"></div>  
                                    @endif
                                      
                                @endforeach
                            </tbody>
                        </table>

                    @endif
                </div>
            </div>

            <div class="mt-4 bg-[#E3EBC1] pt-5 pb-3.5 flex justify-center">
                <strong class="text-xl custom-margin1">Total:&thinsp;
                    <span class="total-amount">
                        ${{ number_format($cartItems->sum(function($item) {
                            return $item->product->price * $item->quantity;
                        }), 2) }}
                    </span>
                </strong>
            </div>

            <div class="mt-2">
                <div class="flex flex-row my-4 justify-center">
                            <x-continue-shopping/>

                            <x-checkout/>

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
            const itemTotalPrices = document.querySelectorAll('.item-total-price'); // Individual item total prices
            const totalAmountElement = document.querySelector('.total-amount'); // Grand total amount

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

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.rectangle {
    position: absolute;
    width: 125px;
    height: 37.5px;
    top: 71px;
    background: #53B637;
    border-radius: 60px;
}
.mycart{
    position: absolute;
    font-family: 'Manjari';
    top: 10px;
    left: 35px;
}
.line{
    width: 100%;
    height: 0px;
    margin-bottom: 10px;
    border: 1px solid #8A8A8A;
}
.line2{
    width: 100%;
    height: 0px;
    margin-bottom: 10px;
    border: 1px solid #e0e0e0;
}
.catagory_container{
    margin:auto;
}
.left-margin{
    margin-left: 1%;
}
.right-margin{
    margin-right: 1%;
}
.img_border{
    border-radius:20%;
    border: 2px solid #4C4343;
}
.custom-margin1{
    margin-left: 1150px;
}
.custom-margin2{
    margin-right: 1250px;
}
</style>
</head>
</html> 
