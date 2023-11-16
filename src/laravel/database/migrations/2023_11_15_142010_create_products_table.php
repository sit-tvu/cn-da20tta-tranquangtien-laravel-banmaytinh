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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('name');
            $table->string('slug');
            $table->integer('cost');
            $table->integer('sale_cost');
            $table->integer('quantity');
            $table->string('color');
            $table->string('option');
            $table->tinyInteger('status')->default('0')->comment('0=visible, 1 = hidden');
            $table->tinyInteger('trending')->default('0')->comment('0=not-trending, 1 = trending');
            $table->longText('description')->nullable;
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
