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
    <a href="{{ route('products.fruits') }}">
        <img src="{{ asset('storage/images/shopnow.png') }}" class="shopnow" alt="Shop Now">
    </a>
</div>

<!-- Popular Products -->
<div class="mt-12">
    <img src="{{ asset('storage/images/populatproduct.png') }}" class="popproduct" alt="popular products">
    <div class="products-container"> <!-- Scrollable container -->
        <!-- Cards -->
        @foreach ($popularProducts as $product)
        <x-product-card :product="$product" :isHomePage="true" />
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
<script>
    function searchComponent() {
        return {
            searchQuery: '',
            showDropdown: false,
            filteredItems: [],
            items: [], // รายการทั้งหมดที่ได้จากการค้นหา
            
            async search() {
                // เรียกค้นหาจาก API เมื่อ searchQuery มีความยาวมากกว่า 1 ตัวอักษร
                if (this.searchQuery.length > 1) {
                    const response = await fetch(`/search?q=${this.searchQuery}`);
                    this.filteredItems = await response.json();
                } else {
                    this.filteredItems = [];
                }
            },
            
            selectItem(item) {
                this.searchQuery = item.name;
                this.showDropdown = false;
            },
            
            hideDropdown() {
                // Delay เล็กน้อยเพื่อให้ click event ทำงานก่อน dropdown ถูกซ่อน
                setTimeout(() => {
                    this.showDropdown = false;
                }, 200);
            }
        };
    }
</script>

</x-app-layout>
