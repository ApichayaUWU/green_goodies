<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = ['user_id', 'product_id' , 'quantity'];
    protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    ];

    // Define the relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // You can also define the relationship to User if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
