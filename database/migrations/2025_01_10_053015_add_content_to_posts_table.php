<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up()
    // {
    //     Schema::table('posts', function (Blueprint $table) {
    //         $table->text('content')->nullable(); // Add nullable if it’s optional
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down()
    // {
    //     Schema::table('posts', function (Blueprint $table) {
    //         $table->dropColumn('content');
    //     });
    // }
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'content')) {
                $table->text('content')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (Schema::hasColumn('posts', 'content')) {
                $table->dropColumn('content');
            }
        });
    }
};
