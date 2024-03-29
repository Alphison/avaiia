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
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('article');
            $table->string('color', 255);
            $table->string('preview_image');
            $table->foreignId('collection_id')->constrained('collections');
            $table->integer('count')->default(0);
            $table->foreignId('status_id')->constrained('product_statuses');
            $table->string('slug', 255);
            $table->text('care');
            $table->timestamps();
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
