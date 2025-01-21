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
        Schema::create('film', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('gambar');
            $table->string('trailer');
            $table->foreignId('id_genre')->references('id')->on('genre')->onDelete('cascade');
            $table->foreignId('id_negara')->references('id')->on('negara')->onDelete('cascade');
            $table->foreignId('id_tahun')->references('id')->on('tahun')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film');
    }
};
