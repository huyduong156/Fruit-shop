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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->longText('description')->nullable();
            $table->timestamps();

            // Thêm foreign keys
            // $table->foreign('category_id')->references('id')->on('categories');
            // $table->foreign('tag_id')->references('id')->on('tags');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
