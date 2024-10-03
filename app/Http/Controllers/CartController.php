<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{

    public function showCart()
    {
        // Fetch cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())
            ->with('product') // Eager load the product
            ->get();
        return view('cart.index', compact('cartItems'));
    }

    public function removeFromCart($id)
    {
        $cartItem = Cart::findOrFail($id);

        // Ensure the user can only delete their own cart items
        if ($cartItem->user_id !== auth()->id()) {
            return back()->withErrors('Unauthorized action.');
        }

        $cartItem->delete();

        return redirect()->route('cart.show')->with('success', 'Item removed from cart successfully!');
    }



    public function addToCart(Request $request, $productId)
    {
        // Fetch product
        $product = Product::findOrFail($productId);

        // Get the cart item if it exists for this user and product
        $cartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        // If the cart item already exists, update the quantity
        if ($cartItem) {
            $newQuantity = $cartItem->quantity + $request->quantity;

            // Ensure new quantity does not exceed stock
            if ($newQuantity > $product->stock_quantity) {
                return back()->withErrors('Quantity exceeds available stock.');
            }

            $cartItem->update(['quantity' => $newQuantity]);
        } else {
            // Create a new cart item
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $productId,
                'quantity' => min($request->quantity, $product->stock_quantity),
            ]);
        }

        return back()->with('success', 'Product added to cart successfully!');
    }

    public function updateAll(Request $request)
    {
        $quantities = $request->input('quantities');

        foreach ($quantities as $cartItemId => $quantity) {
            $cartItem = Cart::find($cartItemId);
            if ($cartItem) {
                if($quantity == 0) {
                    // delete when quantity input == 0
                    $cartItem->delete();
                }else{
                    $cartItem->quantity = $quantity;
                    $cartItem->save(); // save the new quantity
                }
            }
        }

        return redirect()->route('summary.show');
    }

}
