<x-app-layout>
<style>
    .banner {
        background-image: url('{{ asset('storage/images/banner.png') }}');
        background-size: cover; /* ทำให้รูปภาพขยายเต็มพื้นที่ */
        background-position: center; /* จัดตำแหน่งรูปภาพให้อยู่กลาง */
        width: 100%; 
        height: 630px; /* ปรับความสูงของแบนเนอร์ */
        display: flex; /* ใช้ Flexbox */
        justify-content: center; /* จัดให้เนื้อหากลางแนวนอน */
        align-items: center; /* จัดให้เนื้อหากลางแนวตั้ง */
        position: relative; /* ใช้สำหรับ positioning ของลูกเล่นอื่นๆ */
    }

    .featured {
        background-image: url('{{ asset('storage/images/featured.png') }}');
        background-size: cover; /* ทำให้รูปภาพขยายเต็มพื้นที่ */
        background-position: center; /* จัดตำแหน่งรูปภาพให้อยู่กลาง */
        background-repeat: no-repeat;
        width: 100%; 
        height: 509px; /* ปรับความสูงของแบนเนอร์ */
        display: flex; /* ใช้ Flexbox */
        justify-content: center; /* จัดให้เนื้อหากลางแนวนอน */
        align-items: center; /* จัดให้เนื้อหากลางแนวตั้ง */
        position: relative; /* ใช้สำหรับ positioning ของลูกเล่นอื่นๆ */
        margin-top:30px;
    }

    .aboutus {
        background-image: url('{{ asset('storage/images/aboutus.png') }}');
        background-size: cover; /* ทำให้รูปภาพขยายเต็มพื้นที่ */
        background-position: center; /* จัดตำแหน่งรูปภาพให้อยู่กลาง */
        background-repeat: no-repeat;
        width: 100%; 
        height: 350px; /* ปรับความสูงของแบนเนอร์ */
        display: flex; /* ใช้ Flexbox */
        justify-content: center; /* จัดให้เนื้อหากลางแนวนอน */
        align-items: center; /* จัดให้เนื้อหากลางแนวตั้ง */
        position: relative; /* ใช้สำหรับ positioning ของลูกเล่นอื่นๆ */
        margin-top:0px;
    }

    .shopnow {
        width: 230px; /* Set specific width for shop now button */
        height: auto; /* Maintain aspect ratio */
        padding-top: 20px;
    }

    .shopnow:hover {
        content: url('{{ asset('storage/images/shopnowhovered.png') }}');
    }

    .popproduct {
        padding-left: 10px;
        margin-top: -20px;
    }

    .card {
        max-width: 300px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #EFEFEF;
        margin-right: 15px;
    }

    /* Scrollable product row */
    .products-container {
        max-width: screen;
        display: flex;
        overflow-x: auto; /* Enables horizontal scrolling */
        white-space: nowrap; /* Prevents wrapping of items */
        -webkit-overflow-scrolling: touch; /* Makes scrolling smooth on touch devices */
    }

    .products-container::-webkit-scrollbar {
        display: none; /* Hide the scrollbar */
    }
</style>

<!-- Hero Section -->
<div class="banner">
    <a href="{{ route('products.index') }}">
        <img src="{{ asset('storage/images/shopnow.png') }}" class="shopnow" alt="Shop Now">
    </a>
</div>

<!-- Popular Products -->
<div class="mt-12">
    <img src="{{ asset('storage/images/populatproduct.png') }}" class="popproduct" alt="popular products">
    <div class="products-container"> <!-- Scrollable container -->
        <!-- Cards -->
        @foreach ($popularProducts as $product)
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
                    
                    <button class="px-5">
                        <svg width="34" height="31" viewBox="0 0 34 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.4998 25.9167L17.3332 26.0833L17.1498 25.9167C9.23317 18.7333 3.99984 13.9833 3.99984 9.16667C3.99984 5.83333 6.49984 3.33333 9.83317 3.33333C12.3998 3.33333 14.8998 5 15.7832 7.26667H18.8832C19.7665 5 22.2665 3.33333 24.8332 3.33333C28.1665 3.33333 30.6665 5.83333 30.6665 9.16667C30.6665 13.9833 25.4332 18.7333 17.4998 25.9167ZM24.8332 0C21.9332 0 19.1498 1.35 17.3332 3.46667C15.5165 1.35 12.7332 0 9.83317 0C4.69984 0 0.666504 4.01667 0.666504 9.16667C0.666504 15.45 6.33317 20.6 14.9165 28.3833L17.3332 30.5833L19.7498 28.3833C28.3332 20.6 33.9998 15.45 33.9998 9.16667C33.9998 4.01667 29.9665 0 24.8332 0Z" fill="#4C4343"/>
                        </svg>
                    </button>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <div class="flex flex-row gap-4">
                            <!-- Add to Cart Button -->
                            <div class="hidden"><x-quantity-input /></div>
                            <x-add-to-cart />
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Featured Categories -->
<div class="featured">
    <div class="flex justify-around mt-6">
        <!-- Category Icons -->
    </div>
</div>

<!-- About Us Section -->
<div>
    <img src="{{ asset('storage/images/aboutus.png') }}" class="aboutus">
</div>
</x-app-layout>
