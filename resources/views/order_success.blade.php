<x-app-layout>
    <style>
    .order {
        display: flex; /* ใช้ Flexbox */
        flex-direction: column; /* จัดให้องค์ประกอบภายในเรียงในแนวตั้ง */
        justify-content: center; /* จัดแนวกลางในแนวตั้ง */
        align-items: center; /* จัดแนวกลางในแนวนอน */
        min-height: 50vh; /* ลดความสูงลงให้กระชับมากขึ้น */
        text-align: center; /* จัดข้อความให้อยู่ตรงกลาง */
        padding: 20px; /* เพิ่ม padding รอบเนื้อหา */
        padding-top: 130px; 
    }
    .check{
        width: 100px;
        height: 100px;
        margin-bottom:30px;
    }
    .confirm{
        margin-top:-20px;
    }
    .thank{
        margin-top:-20px;
    }
    </style>    

    <div class="order">
    <svg class="check" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_483_811)">
<path d="M50 0C22.3859 0 0 22.3859 0 50C0 77.6156 22.3859 100 50 100C77.6156 100 100 77.6156 100 50C100 22.3859 77.6156 0 50 0ZM50 93.8484C25.8766 93.8484 6.25 74.1234 6.25 49.9998C6.25 25.8764 25.8766 6.2498 50 6.2498C74.1234 6.2498 93.75 25.8765 93.75 49.9998C93.75 74.1231 74.1234 93.8484 50 93.8484ZM69.9547 31.7047L40.6187 61.225L27.4077 48.0141C26.1874 46.7938 24.2093 46.7938 22.9874 48.0141C21.7671 49.2344 21.7671 51.2125 22.9874 52.4328L38.4546 67.9016C39.6749 69.1203 41.653 69.1203 42.8749 67.9016C43.0155 67.7609 43.1359 67.6077 43.2453 67.4484L74.3766 36.1249C75.5953 34.9046 75.5953 32.9265 74.3766 31.7047C73.1547 30.4844 71.1766 30.4844 69.9547 31.7047Z" fill="#53B637"/>
</g>
<defs>
<clipPath id="clip0_483_811">
<rect width="100" height="100" fill="white"/>
</clipPath>
</defs>
</svg>
        <div class="bg-[#53B637] text-center w-[250px] rounded-[50px] my-10 confirm">
                    <p class="pt-5 text-xl text-white p-2"><strong>Order Confirmation</strong></p>
        </div>
        <p class="mt-4 thank">Thank you for your order!</p>
        <p>Your Order ID: <strong>{{ $orderId }}</strong></p>
        <p>We will process your order shortly.</p>
    </div>
</x-app-layout>
