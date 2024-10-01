<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <style>
    .dropdown-list {
        position: absolute !important;
        /* ทำให้ dropdown แสดงอยู่เหนือคอนเทนต์อื่น */
        background-color: white;
        border: 1px solid #ddd;
        width: 185%;
        /* ให้ dropdown กว้างเท่ากับ input */
        max-height: 200px;
        /* กำหนดความสูงสูงสุด */
        overflow-y: auto;
        /* เพิ่ม scroll ถ้า dropdown ยาวเกินไป */
        z-index: 999;
        /* ทำให้ dropdown อยู่เหนือองค์ประกอบอื่น */
        border-radius: 15px !important;
        /* Makes the corners rounded */
    }

    .dropdown-list li {
        padding-left: 15px;
        padding-top: 10px;
        padding-left: 10px;
    }

    .logo {
        width: 250px;
        /* Adjust size as necessary */
        height: auto;
        /* Maintain aspect ratio */
        padding-bottom: 5px;
        padding-left: 10px;
    }

    .logo-container {
        display: flex;
        justify-content: center;
        /* Center the logo horizontally */
        align-items: center;
        /* Center the logo vertically if needed */
        width: 100%;
        /* Take full width */
    }

    .header-height {
        height: 6rem;
        /* Adjust this value for header height (6rem = 96px) */
    }

    .nav-link-padding {
        padding-top: 1.5rem;
        /* Adjust padding to align content vertically */
        padding-bottom: 1.5rem;
    }

    .cart-wishlist {
        width: 30px;
        height: auto;
        padding-bottom: 7px;
        padding-right: 5px;
    }

    .custom-text-size {
        font-size: 1.1rem;
        /* เทียบเท่า text-lg ของ Tailwind */
        font-weight: bold;
        /* เทียบเท่า font-bold */
    }

    input {
        position: relative;
        border-radius: 25px !important;
        /* Makes the corners rounded */
        border: 3px solid #D0D0D0 !important;
        /* Optional border for a cleaner look */
        padding: 10px 20px;
        /* Padding to make the search bar more spacious */
        width: 200% !important;
        /* Make it responsive */
    }

    .boxinput {
        padding-top: 15px !important;
        padding-left: 20px;
    }

    .group {
        padding-left: 680px;
    }

    input::placeholder {
        color: #aaa;
        /* เปลี่ยนสีของ placeholder ที่นี่ */
    }
    </style>
    <!-- Primary Navigation Menu -->
    <div class="header-height">
        <!-- Adjusted the height here -->
        <div class="flex items-center h-full">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center logo-container">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('storage/images/logoheader.png') }}" class="logo" alt="Your Logo" />
                    </a>
                </div>

            </div>

            <div x-data="{ searchQuery: '', searchResults: [], open: false }" @click.away="open = false"
                class="relative boxinput ms-4">
                <input type="text" x-model="searchQuery" @input="fetchSearchResults" @focus="open = true"
                    placeholder="Search products..." class="w-full">
                <ul x-show="open && searchResults.length > 0" class="dropdown-list">
                    <template x-for="result in searchResults">
                        <li>
                            <a :href="`/products/${result.id}`" x-text="result.name"></a>
                        </li>
                    </template>
                </ul>
            </div>


            <script>
            function fetchSearchResults() {
                if (this.searchQuery.length > 0) {
                    fetch(`/search?q=${this.searchQuery}`)
                        .then(response => response.json())
                        .then(data => {
                            this.searchResults = data;
                            this.open = true;
                        });
                } else {
                    this.searchResults = [];
                    this.open = false;
                }
            }
            </script>

            <!-- wishlist cart and username -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4 nav-link-padding group">
                <!-- Wishlist and Cart with Icons -->
                <x-nav-link :href="route('wishlist.index')" class="custom-text-size">
                    <img src="{{ asset('storage/images/wishlist.png') }}" class="cart-wishlist ">
                    {{ __('Wishlist') }}
                </x-nav-link>
                <x-nav-link :href="route('cart.show')" class="custom-text-size">
                    <img src="{{ asset('storage/images/cart.png') }}" class="cart-wishlist">
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
                            {{ __('Profile') }}
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
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>