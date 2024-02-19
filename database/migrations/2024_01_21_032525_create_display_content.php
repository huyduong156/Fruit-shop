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
        Schema::create('display_content', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('title')->nullable();
            $table->string('small-title')->nullable();
            $table->string('link')->nullable();
            $table->string('button-text')->nullable();
            $table->string('possition');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('display_content');
    }
};
