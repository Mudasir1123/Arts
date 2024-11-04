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
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->string('gender')->nullable();
            $table->integer('role')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_user');
    }
};
