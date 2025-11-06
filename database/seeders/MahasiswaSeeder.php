<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

/**
 * Seeder untuk mengisi tabel mahasiswas dengan data dummy
 */
class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        Mahasiswa::factory()
            ->count(20)
            ->create();
        $this->command->info('✅ Berhasil membuat 20 data mahasiswa dummy');
    }
}
