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
        Schema::create('komentar', function (Blueprint $table) {
            $table->id();
            $table->string('isi_komentar');
            $table->integer('rating')->nullable();
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('id_film')->references('id')->on('film')->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->references('id')->on('komentar')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentar');
    }
};
