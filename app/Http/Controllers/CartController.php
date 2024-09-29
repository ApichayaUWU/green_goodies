<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
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

        return redirect()->route('products.detail' , ['product' => $productId])->with('success', 'Product added to cart successfully!');
    }
}
