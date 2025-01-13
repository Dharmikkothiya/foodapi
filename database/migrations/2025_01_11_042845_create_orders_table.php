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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('OrderID');
            $table->unsignedBigInteger('UserID');
            $table->unsignedBigInteger('RestaurantID');
            $table->unsignedBigInteger('AddressID');
            $table->unsignedBigInteger('CourierID')->nullable();
            $table->decimal('TotalPrice', 10, 2);
            $table->time('DeliveryTime');
            $table->decimal('DeliveryPrice', 10, 2);
            $table->time('ExpectedTime');
            $table->enum('OrderStatus', ['Complete', 'Cancel', 'Receive', 'On the Way']);
            $table->timestamp('OrderedAt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('RestaurantID')->references('RestaurantID')->on('restaurants')->onDelete('cascade');
            $table->foreign('AddressID')->references('AddressID')->on('addresses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
