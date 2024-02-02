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
        Schema::create('orderitems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->unique();
            $table->unsignedBigInteger('food_id');
            $table->unsignedBigInteger('order_by');
            $table->unsignedBigInteger('order_to');
            $table->integer('quantity');
            $table->decimal('total_price', 8, 2); // Example: 12345.67
            $table->timestamps();

            // Define foreign key constraints
            // $table->foreign('food_id')->references('id')->on('products');
            // $table->foreign('order_by')->references('id')->on('users');
            // $table->foreign('order_to')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderitems');
    }
};





