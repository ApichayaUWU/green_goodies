<?php
namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{
    public $product;
    public $isHomePage;
    public $isWishlist; // Add this variable

    /**
     * Create a new component instance.
     *
     * @param  $product
     * @param  bool  $isHomePage
     * @param  bool  $isWishlist
     * @return void
     */
    public function __construct($product, $isHomePage = false, $isWishlist = false)
    {
        $this->product = $product;
        $this->isHomePage = $isHomePage;
        $this->isWishlist = $isWishlist; // Initialize the isWishlist variable
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
            'isHomePage' => $this->isHomePage,
            'isWishlist' => $this->isWishlist, // Pass the variable to the Blade view
        ]);
    }
}
