<style>
    .card {
            max-width: 300px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #EFEFEF;
            margin-right: 15px;
    }
</style>
<div class="card bg-white border rounded-lg shadow-md px-6 m-3 flex-col">
    <div onclick="window.location='{{ route('products.detail', $product->id) }}'">
        {{-- Product Image --}}
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-lg w-240px h-222.03px object-cover my-3">
        @else
            <span>No image</span>
        @endif
        <h2 class="text-2xl font-semibold textColor truncate">
            {{ $product->name }}
        </h2>
        <p class="text-lg py-2 textColor">
            ${{ number_format($product->price, 2) }}
        </p>
    </div>
    <div class="flex flex-row flex-wrap justify-center pb-5 justify-self-end">
        <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            
            <div class="flex flex-row gap-4">
                <x-heart-btn/>
                <!-- Add to Cart Button -->
                <div class="hidden"><x-quantity-input /></div>
                <x-add-to-cart />
            </div>
        </form>
    </div>
</div>
