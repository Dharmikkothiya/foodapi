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
        Schema::create('chats', function (Blueprint $table) {
            $table->id('ChatID');
            $table->unsignedBigInteger('ChatConnectorID');
            $table->unsignedBigInteger('UserID')->nullable();
            $table->unsignedBigInteger('CourierID')->nullable();
            $table->unsignedBigInteger('RestaurantID')->nullable();
            $table->text('MessageListID');
            $table->timestamp('MessageTime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('UserID')->references('UserID')->on('users')->onDelete('cascade');
            $table->foreign('CourierID')->references('CourierID')->on('couriers')->onDelete('cascade');
            $table->foreign('RestaurantID')->references('RestaurantID')->on('restaurants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
