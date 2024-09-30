<x-app-layout>
    <div class="py-12 bg-white-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                
                <!-- Hero Section -->
                <div class="text-center bg-yellow-50 py-12">
                    <h1 class="text-4xl font-bold text-gray-700">100% organic products</h1>
                    <p class="mt-4 text-xl text-gray-600">Goodies Grown with Love</p>
                    <a href="{{ route('products.index') }}" class="mt-6 inline-block text-white bg-green-600 px-4 py-2 rounded-md hover:bg-green-500">
                        Shop Now
                    </a>
                </div>
                
                <!-- Popular Products -->
                <div class="mt-12">
                    <h2 class="text-2xl font-semibold text-gray-700">Popular Products</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
                        <!-- Example Product Cards -->
                        <div class="border rounded-md p-4 text-center">
                            <img src="{{ asset('storage/images/product1.png') }}" alt="Product" class="w-full h-40 object-cover">
                            <h3 class="mt-4 text-lg font-bold text-gray-800">Red Apple</h3>
                            <p class="text-gray-600 mt-2">39THB</p>
                            <button class="mt-2 text-white bg-green-600 px-4 py-2 rounded-md">Add</button>
                        </div>
                        <!-- Repeat product cards for other products like Garlic, Strawberry, Coconut -->
                    </div>
                </div>

                <!-- Featured Categories -->
                <div class="mt-12">
                    <h2 class="text-2xl font-semibold text-gray-700">Featured Categories</h2>
                    <div class="flex justify-around mt-6">
                        <!-- Category Icons -->
                        <div class="text-center">
                            <img src="{{ asset('storage/images/category_banana.png') }}" alt="Bananas" class="w-20 h-20 mx-auto">
                            <p class="mt-2 text-gray-600">Bananas</p>
                        </div>
                        <div class="text-center">
                            <img src="{{ asset('storage/images/category_durian.png') }}" alt="Durians" class="w-20 h-20 mx-auto">
                            <p class="mt-2 text-gray-600">Durians</p>
                        </div>
                        <!-- Repeat for Mangoes, Tomatoes, etc. -->
                    </div>
                </div>

                <!-- About Us Section -->
                <div class="mt-12 bg-yellow-50 py-8">
                    <h3 class="text-xl font-bold text-gray-700">About Us</h3>
                    <p class="mt-4 text-gray-600">
                        Green Goodies is your source for fresh organic produce from local farms. We believe in healthy eating and supporting sustainable practices.
                    </p>
                </div>
                 
            </div>
        </div>
    </div>
</x-app-layout>