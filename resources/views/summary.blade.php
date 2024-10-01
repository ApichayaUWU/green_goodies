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

        .cart-container {
            background-color: #F4EDDC;
            padding: 20px;
            border-radius: 10px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #f6f2e7;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            border-radius: 5px;
            object-fit: cover;
        }

        .cart-item-name {
            font-size: 1.5em;
            font-weight: bold;
        }

        .cart-item-quantity {
            font-size: 1.1em;
        }

        .cart-item-price {
            font-size: 1.2em;
            font-weight: bold;
        }

        .cart-total {
            text-align: right;
            font-size: 1.5em;
            font-weight: bold;
            background-color: #e3dac9;
            padding: 10px;
            border-radius: 10px;
        }

        .address-select {
            margin-top: 20px;
        }

        .address-select label {
            font-weight: bold;
        }

        .address-select select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1.1em;
        }
    </style>

    <div class="brownBg pt-6 pb-3 flex flex-row flex-wrap justify-center">
        <h2 class="font-semibold text-4xl text-gray-800 leading-tight">
            {{ __('Cart Summary') }}
        </h2>
    </div>

    <!-- Cart Items -->
    <div class="mt-6 flex justify-center">
        <div class="w-full max-w-4xl cart-container">
            <!-- Address Selection -->
            <form action="{{ route('add.sale') }}" method="POST">
                @csrf
                <div class="address-select mt-4">
                    <label for="address">Select Address for Delivery:</label>
                    <select name="address_id" id="address_id" required>
                        @foreach($addresses as $address)
                            <option value="{{ $address->id }}">
                                {{ $address->address_line1 }}, {{ $address->address_line2 }}, {{ $address->city }},
                                {{ $address->district }}, {{ $address->sub_district }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <h3 class="text-xl font-semibold mb-4">Product Listing</h3>

                @php $totalPrice = 0; @endphp

                @foreach($carts as $cartItem)
                    @php
                        $product = $cartItem->product;  // Assuming eager loading or retrieving product details
                        $totalPrice += $product->price * $cartItem->quantity;
                    @endphp

                    <div class="cart-item">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <div class="cart-item-name">{{ $product->name }}</div>
                        <div class="cart-item-quantity">Quantity: {{ $cartItem->quantity }}</div>
                        <div class="cart-item-price">{{ $product->price * $cartItem->quantity }} THB</div>
                    </div>
                @endforeach

                <div class="cart-total">
                    Total: {{ $totalPrice }} THB
                </div>

                <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                <div class="mt-6">
                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Proceed to Checkout</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
