<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserAddress;
use App\Models\User;
use App\Models\Cart;
use App\Models\WishList;
use App\Models\Product;
use App\Models\SalesOrderDetail;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class SummaryController extends Controller
{
    public function show(){
        $user= Auth::user();
        $addresses = $user->address;
        $carts = $user->cart;
        //return response()->json($user);
        return view('summary',compact('user','addresses','carts'));
    }

    // public function showlog(){
    //     $user= Auth::user();
    //     $products = Product::all();
    //     $wished = $products->wishlist;
    //     return response()->json($products);
    //     return view('summary',compact('user','addresses','carts'));
    // }

public function add_sale(Request $request)
{
    $user = Auth::user();
    $carts = $user->cart;
    

    // Check if cart is not empty
    if ($carts->isEmpty()) {
        return back()->with('error', 'Your cart is empty.');
    }

    // Start a database transaction
    DB::beginTransaction();

    try {
        // Generate a unique order ID
        $orderId = $user->id . rand(10, 99);

        // Iterate through each cart item and create a SalesOrderDetail entry
        foreach ($carts as $cart) {
            SalesOrderDetail::create([
                'order_id' => $orderId,
                'customer_id' => $user->id,
                'product_id'  => $cart->product_id,
                'quantity'    => $cart->quantity,
                'total_price' => $cart->quantity * $cart->product->price,  // Assuming product price is available
            ]);
            // Decrease the stock quantity of the product
            $product = Product::find($cart->product_id);
            if ($product) {
                $product->stock_quantity -= $cart->quantity;
                $product->save(); // Save the updated product
            }
        }

        // Clear the cart after successful order creation
        Cart::where('user_id', $user->id)->delete();

        // Commit the transaction
        DB::commit();

        // Store the order ID in the session
        Session::put('order_id', $orderId);

        return redirect()->route('order_success')->with('success', 'Sale order added successfully! Your Order ID: ' . $orderId);

    } catch (\Exception $e) {
        // Rollback the transaction in case of error
        DB::rollBack();

        return back()->with('error', 'Failed to process the sale order: ' . $e->getMessage());
    }
}

public function orderSuccess()
{
    $orderId = session('order_id');  // Retrieve the order ID from session
    return view('order_success', compact('orderId'));
}


}
