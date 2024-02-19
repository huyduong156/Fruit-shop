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
        Schema::create('comment_blog', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reply_id')->nullable();
            $table->unsignedBigInteger('blog_id');
            $table->unsignedBigInteger('customer_id');
            $table->longText('content',500);
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('blog_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_blog');
    }
};
