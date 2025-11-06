<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel mahasiswas
     * Tabel ini menyimpan data mahasiswa dengan kolom nama dan nim
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id(); // Primary key auto increment
            $table->string('nama'); // Kolom untuk nama mahasiswa
            $table->string('nim')->unique(); // Kolom NIM yang harus unique
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Rollback migrasi (menghapus tabel mahasiswas)
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
