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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the product
            $table->string('image')->nullable(); // Image URL or path, nullable if no image is uploaded
            $table->foreignId('category_id')->nullable() // Foreign key to ProductCategory
                ->constrained('product_categories')
                ->onDelete('set null'); // Automatically delete product if the category is deleted
            $table->text('description')->nullable(); // Description of the product
            $table->decimal('price', 8, 2); // Price of the product with 2 decimal points (e.g., 999999.99)
            $table->integer('stock_quantity')->default(0); // Quantity in stock
            $table->integer('popularity')->default(0); // Popularity, can be a numeric score or ranking
            $table->timestamps(); // Created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
