<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{
    public $product;
    public $isHomePage; // Add this variable

    /**
     * Create a new component instance.
     *
     * @param  $product
     * @param  bool  $isHomePage
     * @return void
     */
    public function __construct($product, $isHomePage = false)
    {
        $this->product = $product;
        $this->isHomePage = $isHomePage; // Initialize the isHomePage variable
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.product-card', [
            'product' => $this->product,
            'isHomePage' => $this->isHomePage, // Pass the variable to the Blade view
        ]);
    }
}
