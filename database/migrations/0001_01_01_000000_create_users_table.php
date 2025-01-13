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
        Schema::create('users', function (Blueprint $table) {
            $table->id('UserID');
            $table->string('UserName', 50);
            $table->string('Email', 100)->unique();
            $table->string('PasswordHash', 255);
            $table->string('FullName', 100);
            $table->string('PhoneNumber', 15)->nullable();
            $table->text('UserBio')->nullable();
            $table->string('UserPhotoURL', 255)->nullable();
            $table->timestamps();  // Includes CreatedAt and UpdatedAt
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        
    }
};
