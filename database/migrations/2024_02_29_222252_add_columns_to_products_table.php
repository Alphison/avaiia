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
        Schema::table('products', function (Blueprint $table) {
            $table->string('name_en', 255);
            $table->text('description_en')->nullable();
            $table->string('color_en', 255);
            $table->text('care_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('name_en');
            $table->dropColumn('description_en');
            $table->dropColumn('color_en');
            $table->dropColumn('care_en');
        });
    }
};
