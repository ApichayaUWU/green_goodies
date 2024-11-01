<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //For displaying all products to users
    public function show()
    {
        $userId = Auth::id();
        $products = Product::paginate(10);

        // Fetch wishlist items for the logged-in user
        $wishlistProductIds = Wishlist::where('user_id', $userId)
                                    ->pluck('product_id')
                                    ->toArray();

        // Add `isWished` attribute to each product
        foreach ($products as $product) {
            $product->isWished = in_array($product->id, $wishlistProductIds);
        }

        return view('products.index', compact('products'));
        //return response()->json($product);
    }

    public function showVegetable()
    {
        $products = DB::table('product_categories as pc')
        ->join('products as p', 'p.category_id', '=', 'pc.id')
        ->where('pc.id', 1)->paginate(12);

        $userId = Auth::id();
        // Fetch wishlist items for the logged-in user
        $wishlistProductIds = Wishlist::where('user_id', $userId)
                                    ->pluck('product_id')
                                    ->toArray();

        // Add `isWished` attribute to each product
        foreach ($products as $product) {
            $product->isWished = in_array($product->id, $wishlistProductIds);
        }
        return view('products.vegetables', compact('products'));
        // return response()->json($product);
    }

    public function showFruit()
    {
        $products = DB::table('product_categories as pc')
        ->join('products as p', 'p.category_id', '=', 'pc.id')
        ->where('pc.id', 2)->paginate(12);

        $userId = Auth::id();
        // Fetch wishlist items for the logged-in user
        $wishlistProductIds = Wishlist::where('user_id', $userId)
                                    ->pluck('product_id')
                                    ->toArray();

        // Add `isWished` attribute to each product
        foreach ($products as $product) {
            $product->isWished = in_array($product->id, $wishlistProductIds);
        }
        return view('products.fruits', compact('products'));
    }

    public function search($searchTerm){
        $products = Product::where('name', 'like', '%' . $searchTerm)->paginate(12);
        return view('products.index', compact('products'));
    }

    public function show_detail(Product $product)
    {
        // Increment the popularity by 1
        $product->popularity += 1;

        // Save the updated product
        $product->save();

        // Check if the product is in the user's wishlist
        $userId = Auth::id();
        $isWished = Wishlist::where('user_id', $userId)
                            ->where('product_id', $product->id)
                            ->exists();

        // Add the `isWished` attribute to the product
        $product->isWished = $isWished;

        
        return view('products.detail', compact('product'));
    }

    // Show form for creating a new product
    public function create()
    {
        $categories = ProductCategory::all(); // Load categories for the form
        return view('products.form', [
            'product' => null, // Indicate a new product
            'categories' => $categories,
        ]);
    }

    public function form()
    {
        $user = AUTH::user();
        if($user->email == "admin@gmail.com"){
            $categories = ProductCategory::all();
            $allProducts = Product::paginate(10); // Get all products
            return view('products.form', compact('categories', 'allProducts'));
        }
        redirect()->route('home')->with('success', 'you are not admin.');
    }

    // Show form for editing a product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all(); // Load categories for the form
        return view('products.form', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    // Store or update the product
    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is nullable
            'category_id' => 'required|exists:product_categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
        ]);

        // Check if this is an update or a new product
        $product = $request->id ? Product::findOrFail($request->id) : new Product;

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        // Set product details
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock_quantity = $request->stock_quantity;

        // Save the product
        $product->save();

        // Redirect to the index or to the create page
        return redirect()->route('products.form')->with('success', 'Product saved successfully.');
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.form')->with('success', 'Product deleted successfully.');
    }
}