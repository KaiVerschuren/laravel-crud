<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_junctions', function (Blueprint $table) {
            $table->id();

            // Foreign keys for the many-to-many relation
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('product_id'); // replace with the actual table name

            // Define foreign key constraints
            $table->foreign('cat_id')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            // Prevent duplicates (optional but common)
            $table->unique(['cat_id', 'product_id']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_junctions');
    }
};
