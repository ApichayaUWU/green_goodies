<x-app-layout >
    <style>
        body {
            background-color: white !important; 
        }
        .card {
            max-width: 300px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #EFEFEF;
        }
        
        .brownBg{
            background-color: #F4EDDC;
        }

        .textColor{
            color: #4C4343;
        }
    </style>
    <div class = "brownBg pt-6 pb-3 flex flex-row flex-wrap justify-center">
        <h2 class="font-semibold text-4xl text-gray-800 leading-tight">
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
                         <div class="card max-w-sm bg-white border rounded-lg shadow-md px-6 m-3 flex-col " >
                                <div onclick="window.location='{{ route('products.detail', $product->id) }}'">
                                    {{-- Product Image --}}
                                    @if($product->image)
                                        <img  src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-lg w-240px h-222.03px object-cover my-3">
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
                                            <div class="hidden"><x-quantity-input/></div>
                                            <x-add-to-cart/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                @endif
            </div>
        </div>

        
    <!-- Include SweetAlert2 from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Check if the session has a success message
    @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif
    </script>
</x-app-layout>
