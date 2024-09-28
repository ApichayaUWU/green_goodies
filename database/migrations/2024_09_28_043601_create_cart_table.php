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
        Schema::create('carts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id') // Foreign key to users table
                ->constrained('users')
                ->onDelete('cascade') // Automatically delete cart items if the user is deleted
                ->onUpdate('cascade');
            $table->foreignId('product_id') // Foreign key to products table
                ->constrained('products')
                ->onDelete('cascade') // Automatically delete cart item if the product is deleted
                ->onUpdate('cascade');
            $table->integer('quantity'); // Quantity of the product in the cart
            $table->timestamps(); // Created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
