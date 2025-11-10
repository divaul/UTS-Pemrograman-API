<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    protected $model = Mahasiswa::class;
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'nim' => date('Y') . $this->faker->unique()->numerify('######'), 
        ];
    }
}
