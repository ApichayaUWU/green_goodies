<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishList;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class WishListController extends Controller
{

    public function index()
    {
        // Fetch cart items for the authenticated user
        $wishlistItems = Wishlist::where('user_id', auth()->id())
            ->with('product') // Eager load the product
            ->get();

        $userId = Auth::id();
        // Fetch wishlist items for the logged-in user
        $wishlistProductIds = Wishlist::where('user_id', $userId)
                                    ->pluck('product_id')
                                    ->toArray();

        // Add `isWished` attribute to each product
        foreach ($wishlistItems as $item) {
            $item->product->isWished = in_array($item->product->id, $wishlistProductIds);
        }
        return view('wishlist.index', compact('wishlistItems'));
        // return response()->json($wishlistItems);
    }

    public function show()
    {
        // Fetch cart items for the authenticated user
        $wishlistItems = Wishlist::where('user_id', auth()->id())
            ->with('product') // Eager load the product
            ->get();
        
        $userId = Auth::id();
        // Fetch wishlist items for the logged-in user
        $wishlistProductIds = Wishlist::where('user_id', $userId)
                                    ->pluck('product_id')
                                    ->toArray();

        // Add `isWished` attribute to each product
        foreach ($wishlistItems as $item) {
            $item->product->isWished = in_array($item->product->id, $wishlistProductIds);
        }
        return view('wishlist.index', compact('wishlistItems'));
    }


    public function toggleWishlist(Request $request, $product)
{
    $userId = Auth::id();

    // Check if the product is already in the wishlist
    $wishlistItem = WishList::where('user_id', $userId)
                              ->where('product_id', $product)
                              ->first();

    if ($wishlistItem) {
        // If it exists, delete it (unwish)
        $wishlistItem->delete();
        return back()->with('success', 'Product removed from wishlist!');
    } else {
        // If it doesn't exist, create it (wish)
        WishList::create([
            'user_id' => $userId,
            'product_id' => $product,
        ]);
        return back()->with('success', 'Product added to wishlist!');
    }
}
}
