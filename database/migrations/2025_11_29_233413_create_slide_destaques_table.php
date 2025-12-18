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
        Schema::create('slide_destaques', function (Blueprint $table) {
            $table->id();
            $table->text('imagem');
            $table->string('titulo_1')->nullable();
            $table->string('titulo_2')->nullable();
            $table->string('link')->nullable();
            $table->integer('ordem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slide_destaques');
    }
};
