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
        Schema::create('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->tinyInteger('quantity');
            $table->tinyInteger('price');
            $table->double('rate',3,1)->nullable();
            $table->longText('rate_content')->nullable();
            $table->tinyInteger('rate_status')->nullable();
            $table->datetime('rate_time')->nullable();
            $table->timestamps();
            $table->primary(['order_id', 'product_id']);


            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
