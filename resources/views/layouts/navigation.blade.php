<nav x-data="{ open: false, searchQuery: '', searchResults: [], highlightedIndex: -1 }" class="bg-white border-b border-gray-100">
    <style>
        .dropdown-list {
            position: absolute !important;
            background-color: white;
            border: 1px solid #ddd;
            width: 185%;
            max-height: 400px;
            overflow-y: auto !important;  /* ให้แน่ใจว่าสามารถเลื่อนขึ้น-ลงได้ */
            z-index: 999;
            border-radius: 15px !important;
            padding: 0px;
        }
        .dropdown-list li {
            padding: 10px;
            cursor: pointer;
        }
        .highlighted {
            background-color: #f0f0f0;
        }
        .logo {
            width: 15vw;
            height: auto;
            padding-bottom: 5px;
            padding-left: 10px;
        }
        .header-height {
            height: 6rem;
        }
        input {
            position: relative;
            border-radius: 25px !important;
            border: 3px solid #D0D0D0 !important;
            padding: 10px 20px;
            width: 200% !important;
        }
        .boxinput {
            padding-top: 15px !important;
            padding-left: 6vw;
        }
        .custom-text-size {
            margin-top: 10px;
            font-size: 1rem; /* ขนาดประมาณ text-2xl ใน Tailwind CSS */
            font-weight: 600; /* ถ้าต้องการให้ตัวหนา */
        }
        .cart{
            width: 2vw;
            margin-top: -8px;
            margin-right: 3px;
        }
        .wishlist{
            width: 2vw;
            margin-top: -8px;
            margin-right:3px;
        }
        .cart-wishlist{
            width: 2vw;
            margin-top: -8px;
            margin-right:3px;
        }

    </style>

    <div class="header-height">
        <div class="flex items-center h-full">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('storage/images/logoheader.png') }}" class="logo" alt="Your Logo" />
                    </a>
                </div>
            </div>

            <!-- Search bar -->
            <div x-data="initSearchComponent()" class="relative boxinput ms-4" @click.away="open = false">
    <input type="text" 
        x-model="searchQuery" 
        @input="fetchSearchResults" 
        @keydown.down="highlightNext" 
        @keydown.up="highlightPrev" 
        @keydown.enter.prevent="selectResult"
        placeholder="Search products..." 
        class="w-full">
    
    <ul x-show="open && searchResults.length > 0" class="dropdown-list">
        <template x-for="(result, index) in searchResults" :key="result.id">
            <li :class="{ 'highlighted': index === highlightedIndex }" 
                @click="goToProduct(result.id)">
                <a x-text="result.name"></a>
            </li>
        </template>
    </ul>
</div>
<script>
function initSearchComponent() {
    return {
        open: false,
        searchQuery: '',
        searchResults: [],
        highlightedIndex: -1,
        
        // ฟังก์ชันสำหรับดึงข้อมูลผลลัพธ์การค้นหา
        fetchSearchResults() {
            if (this.searchQuery.length > 0) {
                fetch(`/search?q=${this.searchQuery}`)
                    .then(response => response.json())
                    .then(data => {
                        this.searchResults = data;
                        this.open = true;
                        this.highlightedIndex = -1; // รีเซ็ตไฮไลท์
                    });
            } else {
                this.searchResults = [];
                this.open = false;
            }
        },

        // ฟังก์ชันสำหรับเลื่อนไฮไลท์ลง
        highlightNext() {
            if (this.highlightedIndex < this.searchResults.length - 1) {
                this.highlightedIndex++;
                this.scrollToHighlighted();
            }
        },

        // ฟังก์ชันสำหรับเลื่อนไฮไลท์ขึ้น
        highlightPrev() {
            if (this.highlightedIndex > 0) {
                this.highlightedIndex--;
                this.scrollToHighlighted();
            }
        },

        // ฟังก์ชันสำหรับเลื่อน dropdown ไปยังรายการที่ถูกไฮไลท์
        scrollToHighlighted() {
    this.$nextTick(() => {
        const dropdown = document.querySelector('.dropdown-list');
        const highlightedItem = dropdown.querySelector('.highlighted');

        if (highlightedItem) {
            const dropdownHeight = dropdown.clientHeight;
            const highlightedTop = highlightedItem.offsetTop;
            const highlightedHeight = highlightedItem.offsetHeight;
            const scrollPosition = dropdown.scrollTop;

            // ถ้ารายการที่ไฮไลท์อยู่ต่ำกว่าที่ dropdown แสดงอยู่
            if (highlightedTop + highlightedHeight > dropdownHeight + scrollPosition) {
                dropdown.scrollTop = highlightedTop + highlightedHeight - dropdownHeight;
            }

            // ถ้ารายการที่ไฮไลท์อยู่สูงกว่าที่ dropdown แสดงอยู่
            if (highlightedTop < scrollPosition) {
                dropdown.scrollTop = highlightedTop;
            }
        }
    });
}
,

        // ฟังก์ชันสำหรับเลือกผลลัพธ์ที่ถูกไฮไลท์
        selectResult() {
            if (this.highlightedIndex >= 0 && this.searchResults.length > 0) {
                const selectedResult = this.searchResults[this.highlightedIndex];
                if (selectedResult) {
                    this.goToProduct(selectedResult.id);
                }
            }
        },

        // ฟังก์ชันสำหรับไปยังหน้าผลิตภัณฑ์ที่ถูกเลือก
        goToProduct(productId) {
            window.location.href = `/products/${productId}`;
        }
    }
}
</script>

        @if (Auth::user())
            <!-- wishlist cart and username -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4 nav-link-padding group" style="margin-left:700px ">
                 <!-- Wishlist and Cart with Icons -->
                 <x-nav-link :href="route('summary.order')" class="custom-text-size min-w-[50px] flex items-center" style="padding-right: 40px; white-space: nowrap;">
    <img src="{{ asset('storage/images/wishlist.png') }}" class="cart-wishlist" style="margin-right: 8px; width: 1.5rem; height: auto; vertical-align: middle;">
    <span style="vertical-align: middle;">{{ __('My Order') }}</span>
</x-nav-link>

        <x-nav-link :href="route('wishlist.index')" class="custom-text-size" style="padding-right: 30px;">
            <img src="{{ asset('storage/images/wishlist.png') }}" class="wishlist">
            {{ __('Wishlist') }}
        </x-nav-link>
        <x-nav-link :href="route('cart.show')" class="custom-text-size" style="padding-right: 10px;">
            <img src="{{ asset('storage/images/cart.png') }}" class="cart">
            {{ __('Cart') }}
        </x-nav-link>

                <!-- User Authentication -->
                @auth
                <!-- This ensures the code inside only runs if the user is authenticated -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <!-- User Profile Photo -->
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full mr-2">
                            <div class="custom-text-size">{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('My Info') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endauth
                <!-- End authentication block -->
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        @endif
    </div>
</nav>
