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
    .popproduct{
        padding-left : 10px;
        margin-top: -20px;
    }
    .card {
            max-width: 300px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #EFEFEF;
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
    <img src="{{ asset('storage/images/populatproduct.png') }}" class="popproduct" alt="populat products">
    <div >
        <!-- Cards -->
    </div>
</div>

<!-- Featured Categories -->
<div class="featured">
    <div class="flex justify-around mt-6">
        <!-- Category Icons -->
    </div>
</div>

<!-- About Us Section -->
<div >
    <img src="{{ asset('storage/images/aboutus.png') }}" class="aboutus">
</div>
</x-app-layout>
