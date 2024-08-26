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
        Schema::table('anggota_pemuda_jemaats', function (Blueprint $table) {
            $table->date('tanggal')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggota_pemuda_jemaats', function (Blueprint $table) {
            $table->dropColumn('tanggal');
        });
    }
};
