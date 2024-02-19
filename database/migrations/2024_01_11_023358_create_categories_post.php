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
        Schema::create('categories_post', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug');
            // $table->unsignedBigInteger('post_id');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            // $table->foreign('post_id')->references('post_id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_post');
    }
};
