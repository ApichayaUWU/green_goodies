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
        'address_id',      // Foreign key referencing address table
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
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function address(){
        return $this->belongsTo(UserAddress::class, 'address_id');
    }
}