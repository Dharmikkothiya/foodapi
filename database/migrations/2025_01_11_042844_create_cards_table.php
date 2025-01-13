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
        Schema::create('cards', function (Blueprint $table) {
            $table->id('CardID');
            $table->string('CardTagType', 50);
            $table->unsignedBigInteger('UserID');
            $table->string('CardHolderName', 100);
            $table->string('CardNumber', 16)->unique();
            $table->date('ExpireDate');
            $table->integer('CVC');
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
