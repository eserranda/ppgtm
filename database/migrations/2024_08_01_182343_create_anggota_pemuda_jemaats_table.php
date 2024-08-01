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
        Schema::create('anggota_pemuda_jemaats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jemaat');
            $table->foreign('id_jemaat')->references('id')->on('jemaats')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('dapel');
            $table->string('nama_anggota');
            $table->string('tgl_lahir');
            $table->string('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('data_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_pemuda_jemaats');
    }
};
