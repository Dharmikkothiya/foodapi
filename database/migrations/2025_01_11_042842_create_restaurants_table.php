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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id('RestaurantID');
            $table->string('Name', 100);
            $table->text('Intro')->nullable();
            $table->float('Rate', 3, 2)->nullable();
            $table->text('PhotosURL')->nullable();
            $table->unsignedBigInteger('AddressID');
            $table->foreign('AddressID')->references('AddressID')->on('addresses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
