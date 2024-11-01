<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function popular()
    {

        // Fetch products ordered by popularity (descending), limit to top 5 for example
        // $popularProducts = Product::where('stock_quantity', '>', 0)->orderBy('popularity', 'desc')->limit(10)->get(); 
        $popularProducts = Product::orderBy('popularity', 'desc')->limit(10)->get(); 

        $userId = Auth::id();
        // Fetch wishlist items for the logged-in user
        $wishlistProductIds = Wishlist::where('user_id', $userId)
                                    ->pluck('product_id')
                                    ->toArray();

        // Add `isWished` attribute to each product
        foreach ($popularProducts as $product) {
            $product->isWished = in_array($product->id, $wishlistProductIds);
        }

        if($user = Auth::user()){
            // Return the view with the products
            return view('home', [
            'popularProducts' => $popularProducts, // Pass the popular products to the view
            ]);
        }


        // Return the view with the products
        return view('guest_home', [
            'popularProducts' => $popularProducts, // Pass the popular products to the view
        ]);
    }

}