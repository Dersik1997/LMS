<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kelas', function (Blueprint $table) {
            // Menambahkan kolom nama_kelas setelah kode_kelas, default-nya Reguler
            $table->string('nama_kelas')->nullable()->default('Reguler')->after('kode_kelas');
        });
    }

    public function down(): void
    {
        Schema::table('kelas', function (Blueprint $table) {
            $table->dropColumn('nama_kelas');
        });
    }
};