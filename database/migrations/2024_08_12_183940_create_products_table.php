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
            $table->string('title');
            $table->string('description');
            $table->string('image_url');
            $table->string('audio_url');
            $table->Integer('license_id');
            $table->Integer('copyright_id');
            $table->Decimal('price');
            $table->string('tempo');
            $table->string( 'key');
            $table->Integer('user_id');
            $table->Integer('status');
            $table->Integer('category_id');
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
