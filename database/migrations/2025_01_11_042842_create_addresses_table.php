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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id('AddressID');
            $table->unsignedBigInteger('UserID');
            $table->string('AddressTag', 50);
            $table->text('Address');
            $table->string('Street', 100);
            $table->string('Pincode', 20);
            $table->string('Apartment', 100)->nullable();
            $table->text('MapLocationData')->nullable();
            $table->timestamps();

            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
