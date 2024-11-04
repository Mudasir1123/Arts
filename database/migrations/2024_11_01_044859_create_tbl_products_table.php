<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**      * Run the migrations.      */     public function up(): void
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_code')->unique();
            // $table->string('categories_id');
    //         $table->unsignedBigInteger('categories_id');
    // $table->foreign('categories_id')->references('id')->on('categories');
            $table->string('product_image');
            $table->string('product_name');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }
    };

