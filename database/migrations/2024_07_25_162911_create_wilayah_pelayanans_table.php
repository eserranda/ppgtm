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
        Schema::create('wilayah_pelayanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_klasis'); // Deklarasi kolom harus sebelum foreign key constraint
            $table->foreign('id_klasis')->references('id')->on('klases')->cascadeOnDelete(); // Gunakan hanya satu metode penghapusan
            $table->string('wilayah');
            $table->string('koordinator');
            $table->integer('no_telp');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayah_pelayanans');
    }
};
