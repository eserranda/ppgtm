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
        Schema::create('program_kerja_jemaats', function (Blueprint $table) {
            $table->id();
            $table->string('bidang');
            $table->string('ketua_bidang');
            $table->string('anggota');
            $table->string('program');
            $table->string('tujuan');
            $table->string('sasaran');
            $table->string('bentuk_kegiatan');
            $table->string('waktu');
            $table->string('pelaksana');
            $table->string('sumber_dana');
            $table->string('implementasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_kerja_jemaats');
    }
};
