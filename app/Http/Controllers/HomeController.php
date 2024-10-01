<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function popular()
    {
        // Fetch products ordered by popularity (descending), limit to top 5 for example
        $popularProducts = Product::orderBy('popularity', 'desc')->limit(10)->get(); 

        // Return the view with the products
        return view('home', [
            'popularProducts' => $popularProducts, // Pass the popular products to the view
        ]);
    }
}