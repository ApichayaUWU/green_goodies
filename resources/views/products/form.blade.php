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

        .textColorSelected {
            color: #53B637;
        }

    </style>
    <div class="brownBg pt-6 pb-3 flex flex-row flex-wrap justify-center">
        <h2 class="font-semibold text-4xl text-gray-800 leading-tight">
        {{ isset($product) ? __('Edit Product') : __('Stock Control') }}
        </h2>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Button to toggle form --}}
                    <button id="toggleFormButton"
                        class="bg-[#53B637] text-center w-[250px] rounded-[40px] mt-3 mb-4 flex flex-row justify-center"
                        onclick="toggleForm()">
                        <span class="pt-5 text-xl text-white p-2"><strong>{{ isset($product) ? 'Edit Product' : 'Add New Product' }}</strong></span>
                        <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg"
                            class="mt-5 ml-2 h-5 w-5 transition-transform transform rotate-0" fill="none" viewBox="0 0 24 24"
                            stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                    </button>

                    {{-- Form for creating and editing a product --}}
                    <div id="productForm"
                        class="mt-8 hidden overflow-hidden transition-all duration-500 ease-in-out max-h-0">

                        <form
                            action="{{ route('products.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            {{-- Product Name --}}
                            <div class="mb-4 w-[300px]">
                                <label for="name" class="block text-l font-medium text-[#4C4343]-700">Product Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}"
                                    class="block w-full px-4 py-2 mt-2 border-gray-300 rounded-md focus:ring focus:ring-indigo-300 focus:border-indigo-300"
                                    required />
                            </div>

                            {{-- Product Image --}}
                            <div class="mb-4 w-[300px]">
                                <label for="image" class="block text-l font-medium text-[#4C4343]-700">Product Image</label>
                                <input type="file" name="image" id="image"
                                    class="block w-full px-4 py-2 mt-2 border-gray-300 rounded-md focus:ring focus:ring-indigo-300 focus:border-indigo-300"
                                    accept="image/*" onchange="previewImage(event)" />
                                <div class="mt-2">
                                    <img id="imagePreview"
                                        src="{{ isset($product) ? asset('storage/' . $product->image) : '#' }}"
                                        alt="Image Preview" class="{{ isset($product) ? '' : 'hidden' }}" width="150">
                                </div>
                            </div>

                            {{-- Product Category --}}
                            <div class="mb-4 w-[300px]">
                                <label for="category_id"
                                    class="block text-l font-medium text-[#4C4343]-700">Category</label>
                                <select name="category_id" id="category_id"
                                    class="block w-full px-4 py-2 mt-2 border-gray-300 rounded-md focus:ring focus:ring-indigo-300 focus:border-indigo-300"
                                    required>
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Product Description --}}
                            <div class="mb-4">
                                <label for="description"
                                    class="block text-l font-medium text-[#4C4343]-700">Description</label>
                                <textarea name="description" id="description" rows="4"
                                    class="block w-full px-4 py-2 mt-2 border-gray-300 rounded-md focus:ring focus:ring-indigo-300 focus:border-indigo-300"
                                    required>{{ old('description', $product->description ?? '') }}</textarea>
                            </div>

                            {{-- Product Price --}}
                            <div class="mb-4 w-[300px]">
                                <label for="price" class="block text-l font-medium text-[#4C4343]-700">Price</label>
                                <input type="number" name="price" id="price" step="0.01"
                                    value="{{ old('price', $product->price ?? '') }}"
                                    class="block w-full px-4 py-2 mt-2 border-gray-300 rounded-md focus:ring focus:ring-indigo-300 focus:border-indigo-300"
                                    required />
                            </div>

                            {{-- Stock Quantity --}}
                            <div class="mb-4 w-[300px]">
                                <label for="stock_quantity" class="block text-l font-medium text-[#4C4343]-700">Stock
                                    Quantity</label>
                                <input type="number" name="stock_quantity" id="stock_quantity"
                                    value="{{ old('stock_quantity', $product->stock_quantity ?? '') }}"
                                    class="block w-full px-4 py-2 mt-2 border-gray-300 rounded-md focus:ring focus:ring-indigo-300 focus:border-indigo-300"
                                    required />
                            </div>

                            {{-- Submit Button --}}
                            <div class="mt-6 ">
                                <button type="submit"
                                    class="bg-[#E3EBC1] hover:bg-[#f7f9ee] text-center w-[150px] rounded-[40px] mt-3 mb-4">
                                    <p class="pt-4 text-l text-[#4C4343] p-2">
                                    <strong>{{ isset($product) ? 'Update Product' : 'Add Product' }}</strong>
                                    </p>
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 text-gray-900">
                    {{-- Display all products --}}
                    <div class="mt-8">
                        <h2 class="text-2xl mb-4 font-semibold text-gray-700">All Products</h2>

                        @if($allProducts->isEmpty())
                        <p>No products available at the moment.</p>
                        @else
                        <table class="min-w-full table-auto ">
                            <thead class="bg-[#fbf8f1]">
                                <tr>
                                    <th class="p-2 text-lg text-[#4C4343]">Image</th>
                                    <th class="p-2 text-lg text-[#4C4343]">Name</th>
                                    <th class="p-2 text-lg text-[#4C4343]">Category</th>
                                    <th class="p-2 text-lg text-[#4C4343]">Price</th>
                                    <th class="p-2 text-lg text-[#4C4343]">Stock</th>
                                    <th class="p-2 text-lg text-[#4C4343]">Description</th>
                                    <th class="p-2 text-lg text-[#4C4343]">Popularity</th>
                                    <th class="p-2 text-lg text-[#4C4343]">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allProducts as $product)
                                <tr class="border-b">
                                    {{-- Product Image --}}
                                    <td class="px-4 py-2">
                                        @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                            class="w-16 h-16 object-cover">
                                        @else
                                        <span>No image</span>
                                        @endif
                                    </td>

                                    {{-- Product Name --}}
                                    <td class="px-4 py-2 text-center">
                                        {{ $product->name }}
                                    </td>

                                    {{-- Product Category --}}
                                    <td class="px-4 py-2 text-center">
                                        {{ $product->category->name ?? 'Uncategorized' }}
                                    </td>

                                    {{-- Product Price --}}
                                    <td class="px-4 py-2 text-center">
                                        ${{ number_format($product->price, 2) }}
                                    </td>

                                    {{-- Stock Quantity --}}
                                    <td class="px-4 py-2 text-center">
                                        {{ $product->stock_quantity }}
                                    </td>

                                    {{-- Description --}}
                                    <td class="px-4 py-2">
                                        {{ Str::limit($product->description, 50) }}
                                    </td>

                                    {{-- Popularity --}}
                                    <td class="px-4 py-2 text-center">
                                        {{ $product->popularity }}
                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-4 py-2 flex flex-col justify-center">
                                        {{-- Edit Button --}}
                                        <button class="bg-[#E3EBC1] hover:bg-[#f7f9ee] text-center w-[100px] rounded-[40px] mb-2"
                                            onclick="openEditModal({{ json_encode($product) }})">
                                            <p class="pt-4 text-l text-[#4C4343] p-2"><strong>Edit</strong></p>
                                        </button>

                                        {{-- Delete Button --}}
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-[#b95846] hover:bg-[#cf8d81] text-center w-[100px] rounded-[40px]"
                                                onclick="return confirm('Are you sure you want to delete this product?')">
                                                <p class="pt-4 text-l text-white p-2"><strong>Delete</strong></p>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mx-10 my-10">
                            {{ $allProducts->links('pagination::tailwind') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal for editing product --}}
    <div id="editModal" class="fixed inset-0 overflow-scroll  flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/2 p-6 ">
            <h3 class="text-lg font-semibold text-gray-800">Edit Product</h3>
            <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="edit_id" class="block text-sm font-medium text-gray-700">id</label>
                    <input type="number" name="id" id="edit_id"
                        class="block w-full px-4 py-2 mt-2 border-gray-300 rounded-md focus:ring focus:ring-indigo-300 focus:border-indigo-300"
                        required />
                </div>

                <div class="mb-4">
                    <label for="edit_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="name" id="edit_name"
                        class="block w-full px-4 py-2 mt-2 border-gray-300 rounded-md focus:ring focus:ring-indigo-300 focus:border-indigo-300"
                        required />
                </div>

                <div class="mb-4">
                    <label for="edit_image" class="block text-sm font-medium text-gray-700">Product Image</label>
                    <input type="file" name="image" id="edit_image"
                        class="block w-full px-4 py-2 mt-2 border-gray-300 rounded-md focus:ring focus:ring-indigo-300 focus:border-indigo-300"
                        accept="image/*" onchange="previewEditImage(event)" />
                    <div class="mt-2">
                        <img id="edit_imagePreview" src="#" alt="Image Preview" class="hidden" width="150">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="edit_category_id" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" id="edit_category_id"
                        class="block w-full px-4 py-2 mt-2 border-gray-300 rounded-md focus:ring focus:ring-indigo-300 focus:border-indigo-300"
                        required>
                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="edit_description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="edit_description" rows="4"
                        class="block w-full px-4 py-2 mt-2 border-gray-300 rounded-md focus:ring focus:ring-indigo-300 focus:border-indigo-300"
                        required></textarea>
                </div>

                <div class="mb-4">
                    <label for="edit_price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" id="edit_price" step="0.01"
                        class="block w-full px-4 py-2 mt-2 border-gray-300 rounded-md focus:ring focus:ring-indigo-300 focus:border-indigo-300"
                        required />
                </div>

                <div class="mb-4">
                    <label for="edit_stock_quantity" class="block text-sm font-medium text-gray-700">Stock
                        Quantity</label>
                    <input type="number" name="stock_quantity" id="edit_stock_quantity"
                        class="block w-full px-4 py-2 mt-2 border-gray-300 rounded-md focus:ring focus:ring-indigo-300 focus:border-indigo-300"
                        required />
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="px-6 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:ring focus:ring-indigo-300 focus:border-indigo-300">
                        Update Product
                    </button>
                </div>
            </form>
            <button class="absolute top-0 right-0 p-2" onclick="closeModal()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function toggleForm() {
        const form = document.getElementById('productForm');
        const icon = document.getElementById('toggleIcon');

        // Toggle hidden class and adjust max-height for animation
        form.classList.toggle('hidden');
        form.style.maxHeight = form.classList.contains('hidden') ? '0' : '1000px';

        // Rotate the arrow icon
        icon.classList.toggle('rotate-180');
    }


    function openEditModal(product) {
        document.getElementById('editForm').action = '/backroom/' + product.id;
        document.getElementById('edit_id').value = product.id;
        document.getElementById('edit_name').value = product.name;
        document.getElementById('edit_category_id').value = product.category_id;
        document.getElementById('edit_description').value = product.description;
        document.getElementById('edit_price').value = product.price;
        document.getElementById('edit_stock_quantity').value = product.stock_quantity;

        const editModal = document.getElementById('editModal');
        editModal.classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function previewEditImage(event) {
        const imagePreview = document.getElementById('edit_imagePreview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.classList.remove('hidden');
        };

        reader.readAsDataURL(file);
    }
    </script>
</x-app-layout>