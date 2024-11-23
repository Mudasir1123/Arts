<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id'); // Link to users table
            $table->string('customer_name'); // Customer name
            $table->string('email'); // Customer email
            $table->string('phone'); // Phone number
            $table->text('address')->nullable(); // Address
            $table->integer('quantity'); // Total Quantity
            $table->decimal('total_amount', 10, 2); // Total Amount
            $table->char('delivery_type', 1); // Delivery Type
            $table->string('payment_status'); // Payment Status
            $table->integer('order_status')->default(0)->nullable();
            $table->string('account_number')->nullable(); // Account number (only if online payment)
            $table->timestamps(); // Created and updated timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
