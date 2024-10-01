<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrderDetail extends Model
{
    use HasFactory;

    protected $table = 'sales_order_detail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',        // The ID of the order this detail belongs to
        'customer_id',     // Foreign key referencing users table
        'product_id',      // Foreign key referencing products table
        'quantity',        // Quantity of the product
        'total_price',     // Total price for this line item
    ];

    /**
     * Get the product associated with the sales order detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Get the customer that owns the sales order detail.
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
