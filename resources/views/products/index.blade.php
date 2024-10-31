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

    h2 {
        color: #4C4343;
    }

    .featured {
        background-image: url('{{ asset('storage/images/GrassWall4.png') }}');
        background-size: cover;
        /* ทำให้รูปภาพขยายเต็มพื้นที่ */
        background-position: center;
        /* จัดตำแหน่งรูปภาพให้อยู่กลาง */
        background-repeat: no-repeat;
        width: 100%;
        height: 500px;
        /* ปรับความสูงของแบนเนอร์ */
        display: flex;
        /* ใช้ Flexbox */
        justify-content: center;
        /* จัดให้เนื้อหากลางแนวนอน */
        align-items: center;
        /* จัดให้เนื้อหากลางแนวตั้ง */
        position: relative;
        /* ใช้สำหรับ positioning ของลูกเล่นอื่นๆ */
        margin-top: 30px;
        z-index: 2;
    }
    .cat-container {
    max-width: 100vw; /* เพิ่ม max-width */
    overflow-x: auto;
    white-space: nowrap;
}

    .cat-container::-webkit-scrollbar {
        display: none; /* Hide the scrollbar */
    }
    
    </style>
    <div class="brownBg pt-6 pb-3 flex flex-row flex-wrap justify-center">
        <h2 class="font-semibold text-4xl leading-tight">

            {{ __('Our Products') }}
        </h2>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-3 text-gray-900">
            @if($products->isEmpty())
            <p>No products available at the moment.</p>
            @else
            <div class="flex flex-row flex-wrap justify-center">
                @foreach ($products as $product)
                <x-product-card :product="$product" :isHomePage="false" />
                @endforeach

            </div>
            @endif
            <div class="mx-10 my-10">
                {{ $products->links('pagination::tailwind') }}
            </div>
        </div>
        <!-- Featured Categories -->
        <div class="featured flex justify-center flex-col">
        <div class="featured flex justify-center flex-col overflow-hidden">
            <x-Featured-Home />
            <div class="cat-container overflow-x-auto">
            <div class="flex flex-nowrap justify-between mt-32 space-x-16 px-4">
                    <!-- Category Icons -->
                        <x-Banana-Home />
                        <x-Durains-Home />
                        <x-Mangoes-Home />
                        <x-Tomatoes-Home />
                        <x-Chilli-Home />
                        <x-Carrot-Home />
                </div>
            </div>
    </div>
        </div>
        <!-- About Us Section -->


</x-app-layout>