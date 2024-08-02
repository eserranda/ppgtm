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
        Schema::create('pengurus_klases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_klasis');
            $table->foreign('id_klasis')->references('id')->on('klases')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama');
            $table->string('bidang');
            $table->string('jabatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus_klases');
    }
};
