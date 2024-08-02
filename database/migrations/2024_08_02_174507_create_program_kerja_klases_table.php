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
        Schema::create('program_kerja_klases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_klasis');
            $table->foreign('id_klasis')->references('id')->on('klases')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('bidang');
            $table->string('ketua_bidang');
            $table->string('anggota');
            $table->string('program');
            $table->string('dasar_pemikiran');
            $table->string('kegiatan');
            $table->string('tujuan');
            $table->string('sasaran');
            $table->string('penanggung_jawab');
            $table->string('waktu_pelaksana');
            $table->string('pelaksana');
            $table->string('biaya');
            $table->string('data_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_kerja_klases');
    }
};
