<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'category_id', // Foreign key to ProductCategory
        'description',
        'price',
        'stock_quantity',
        'popularity',
    ];

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    /**
     * Get the sales order details for the product.
     */
    public function salesOrderDetails()
    {
        return $this->hasMany(SalesOrderDetail::class, 'product_id');
    }

    public function wishlists()
    {
        return $this->hasMany(WishList::class, 'product_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }

}