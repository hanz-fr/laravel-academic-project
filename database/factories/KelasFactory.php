<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'teacher_id' => 585192126,
            'tahun_ajaran' => $this->faker->year(),
            'kelas' => $this->faker->randomElement(['X','XI','XII']),
            'jurusan' => $this->faker->randomElement(['IPA', 'IPS']),
            'status' => 'aktif',
        ];
    }
}
