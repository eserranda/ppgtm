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
        Schema::create('pengurus_jemaats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jemaat');
            $table->foreign('id_jemaat')->references('id')->on('jemaats')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama');
            $table->string('bidang');
            $table->string('jabatan')->nullable();
            $table->integer('tahun_mulai');
            $table->integer('tahun_selesai');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus_jemaats');
    }
};
