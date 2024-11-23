<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('feedbacks', function (Blueprint $table) {
        $table->unsignedBigInteger('order_id'); // To link feedback with orders
        $table->unsignedBigInteger('product_id'); // To identify the product
        $table->text('feedback'); // The feedback text
        $table->unsignedTinyInteger('rating'); // The rating (1-5)
        $table->timestamps(); // For created_at and updated_at
    });
}

public function down()
{
    Schema::dropIfExists('feedbacks');
}
};
