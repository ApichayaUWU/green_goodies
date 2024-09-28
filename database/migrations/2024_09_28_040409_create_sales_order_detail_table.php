<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales_order_detail', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->integer('order_id'); // Order ID 
            $table->foreignId('customer_id')->nullable() // Foreign key to users table
                ->constrained('users')
                ->onDelete('set null') // Automatically delete details if the user is deleted
                ->onUpdate('cascade');
            $table->foreignId('product_id')->nullable() // Foreign key to products table
                ->constrained('products')
                ->onDelete('set null') // Automatically delete details if the product is deleted
                ->onUpdate('cascade');
            $table->integer('quantity'); // Quantity of the product ordered
            $table->decimal('total_price', 10, 2); // Total price of the order line item
            $table->timestamps(); // Created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_order_detail');
    }
};
