<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all products (you can modify this to paginate or filter if necessary)
        $products = Product::all(); // You could also paginate: Product::paginate(10)

        // Return the view with the products
        return view('home', [
            'products' => $products,
        ]);
    }
}