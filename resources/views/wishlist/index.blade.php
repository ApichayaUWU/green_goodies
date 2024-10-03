<x-app-layout>
<style>
    .wishlist{
        margin-top: 20px;
    }
    .no{
        padding-left:60px;
        padding-top:15px;
    }
</style>
<div class="bg-[#53B637] text-center w-[200px] rounded-[40px] mt-10 mb-4 mx-8">
        <p class="pt-5 text-2xl text-white p-2"><strong>Wish List</strong></p>
    </div>
<div class="p-3 text-gray-900">
            @if($wishlistItems->isEmpty())
            <div class = "flex flex-row justify-center">
                    <div><svg xmlns="http://www.w3.org/2000/svg" width="250" height="250" fill="#b8b8b8" class="bi bi-heartbreak-fill" viewBox="0 0 16 16">
                        <path d="M8.931.586 7 3l1.5 4-2 3L8 15C22.534 5.396 13.757-2.21 8.931.586M7.358.77 5.5 3 7 7l-1.5 3 1.815 4.537C-6.533 4.96 2.685-2.467 7.358.77"/>
                    </svg></div>
                    </div>
                    <div class = "flex flex-row justify-center my-6"><div>
                        <p class="p-2 text-2xl text-[#b8b8b8] ml-4">- You have not added any items to your wishlist at this time. -</p>
                    </div></div>
            @else
            <div class="flex flex-row flex-wrap justify-center">
                @foreach ($wishlistItems as $item)
                <x-product-card :product="$item->product" :isHomePage="false" />
                @endforeach

            </div>
            @endif
        </div>

</x-app-layout>
