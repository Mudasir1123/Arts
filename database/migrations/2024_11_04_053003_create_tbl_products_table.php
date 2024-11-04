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
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_code')->unique(); // Unique product code
            $table->unsignedBigInteger('category_id'); // Foreign key for categories
            $table->string('product_image'); // Path for the product image
            $table->string('product_name'); // Name of the product
            $table->text('description')->nullable(); // Product description
            $table->integer('price'); // Product price
            $table->integer('stock')->default(0); // Stock quantity
            $table->timestamps(); // Created and updated timestamps

            // Foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_products');
    }
};
