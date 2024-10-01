@props(['quantity' => 1]) <!-- Set default value as 1 -->

<form class="max-w-xs mx-auto">
    <div class="relative flex items-center max-w-[8rem] gap-2">
        <!-- Decrement button -->
        <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" 
            class="bg-white hover:bg-gray-100 border-gray-300 rounded-full p-3 h-11 focus:ring-gray-200 focus:ring-2 focus:outline-none">
            <svg class="w-3 h-3 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
            </svg>
        </button>

        <!-- Input field -->
        <input type="text" name="quantity" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation"
            class="bg-white border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5"
            value="{{ $quantity }}" required />

        <!-- Increment button -->
        <button type="button" id="increment-button" data-input-counter-increment="quantity-input" 
            class="bg-white hover:bg-gray-100 border-gray-300 rounded-full p-3 h-11 focus:ring-gray-200 focus:ring-2 focus:outline-none">
            <svg class="w-3 h-3 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
        </button>
    </div>
</form>
