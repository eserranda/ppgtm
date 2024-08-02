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
        Schema::table('pengurus_sinodes', function (Blueprint $table) {
            $table->dropForeign(['id_jemaat']);
            $table->dropColumn('id_jemaat');
            $table->string('jabatan')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengurus_sinodes', function (Blueprint $table) {
            // Tambah kembali kolom 'id_jemaat' dengan foreign key
            $table->unsignedBigInteger('id_jemaat');
            $table->foreign('id_jemaat')->references('id')->on('jemaats')->cascadeOnDelete()->cascadeOnUpdate();

            // Ubah kembali kolom 'jabatan' agar tidak dapat bernilai null
            $table->string('jabatan')->nullable(false)->change();
        });
    }
};
