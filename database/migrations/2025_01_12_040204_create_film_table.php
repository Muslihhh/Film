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
            $table->string('image');
            $table->text('sinopsis');
            $table->string('trailer')->nullable();
            $table->foreignId('id_negara')->references('id')->on('negara')->onDelete('cascade');
            $table->integer('tahun_rilis');
            $table->string('age_category');
            $table->integer('durasi');
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
