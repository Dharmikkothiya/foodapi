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
        Schema::create('favorite_foods', function (Blueprint $table) {
            $table->id('FavoriteFoodListID');
            $table->unsignedBigInteger('UserID');
            $table->unsignedBigInteger('FoodID');
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('FoodID')->references('FoodID')->on('foods')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite_food');
    }
};
