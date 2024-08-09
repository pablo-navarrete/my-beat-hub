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
        Schema::create('r_r_s_s_footers', function (Blueprint $table) {
            $table->id();
            $table->longText('facebook')->nullable();
            $table->longText('instagram')->nullable();
            $table->longText('youtube')->nullable();
            $table->integer('status_facebook');
            $table->integer('status_instagram');
            $table->integer('status_youtube');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_r_s_s_footers');
    }
};
