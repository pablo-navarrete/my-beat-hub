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
        Schema::create('contact_footers', function (Blueprint $table) {
            $table->id();
            $table->string('correo')->nullable();
            $table->string('celular')->nullable();
            $table->string('whatsapp')->nullable();
            $table->integer('status_correo');
            $table->integer('status_celular');
            $table->integer('status_whatsapp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_footers');
    }
};
