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
            $table->unsignedBigInteger('chief_id');
            $table->string('food_name');
            $table->string('food_image')->nullable();
            $table->text('food_descriptions');
            $table->text('ingredients')->nullable();
            $table->boolean('is_available');
            $table->string('category_tag')->nullable();
            $table->integer('quantity_available')->nullable();
            $table->decimal('food_price', 8, 2); // Example: 12345.67
            $table->timestamps();
 
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
