<style>
.card {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    background-color: #EFEFEF;
    margin-right: 15px;
}


.home-card {
    max-width: 300px;
    min-width: 300px;
}

.products-card {
    max-width: 300px;
    min-width: 300px;
}

.wl {
    margin-right: 35px;
    margin-top: 3px;
}

.img1 {
    width: 100%;
    height: 250px;
    object-fit: cover;
}
</style>

<div class="card {{ $isHomePage ? 'home-card' : 'products-card' }} bg-white border rounded-lg shadow-md px-6 m-3 flex-col">
<div onclick="window.location.href='{{ route('products.detail', $product->id) }}'">

        {{-- Product Image --}}
        @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
            class="rounded-lg w-full object-cover my-3 img1">
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

    
    @if(Auth::user())
        @if($product->stock_quantity > 0)
            <div class="flex flex-row flex-wrap justify-center pb-5 justify-self-end">
                <x-heart-btn :productId="$product->id" />
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <div class="flex flex-row gap-4">
                        <!-- Add to Cart Button -->
                        <div class="hidden">
                            <x-quantity-input />
                        </div>
                        <x-add-to-cart />
                    </div>
                </form>
            </div>
        @else
            <div class="text-center">

                <p class="text-xl textColor pt-2"><strong>- Sold out. -</strong></p>
            </div>
        @endif
    @endif
</div>

    
</div>


