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
        Schema::create('foods', function (Blueprint $table) {
            $table->id('FoodID');
            $table->string('Name', 100);
            $table->text('Details')->nullable();
            $table->float('Rate', 3, 2)->default(0);
            $table->string('Size', 20)->nullable();
            $table->decimal('Price', 10, 2);
            $table->text('IngredientsListID')->nullable();
            $table->unsignedBigInteger('CategoryID');
            $table->unsignedBigInteger('RestaurantID');
            $table->foreign('CategoryID')->references('CategoryID')->on('food_categories')->onDelete('cascade');
            $table->foreign('RestaurantID')->references('RestaurantID')->on('restaurants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
