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
        Schema::create('user_address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id') // Foreign key to users table
                ->constrained('users')
                ->onDelete('cascade'); // Automatically delete address if user is deleted
            $table->string('address_name');
            $table->string('address_line1'); // First line of the address
            $table->string('address_line2')->nullable(); // Second line of the address, optional
            $table->string('city'); // City of the user
            $table->string('district'); // District of the user
            $table->string('sub_district'); // Sub-district of the user
            $table->timestamps(); // Created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_address');
    }
};