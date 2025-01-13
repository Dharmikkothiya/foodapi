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
        Schema::create('couriers', function (Blueprint $table) {
            $table->id('CourierID');
            $table->string('Name', 100);
            $table->string('ProfilePhotoURL', 255);
            $table->string('PhoneNumber', 15);
            $table->unsignedBigInteger('ChatID')->nullable();
            $table->foreign('ChatID')->references('ChatID')->on('chats')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couriers');
    }
};
