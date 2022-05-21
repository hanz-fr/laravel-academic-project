<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id' => 1164015,
            'subject_id' => 2,
            'semester' => 1,
            'tugas_1' => mt_rand(50,100),
            'tugas_2' => mt_rand(50,100),
            'tugas_3' => mt_rand(50,100),
            'UTS' => mt_rand(50,100),
            'UAS' => mt_rand(50,100),
            'nilai_avg' => mt_rand(50, 100),
            'nilai_total' => mt_rand(80, 100),
            'keterangan_raport' => $this->faker->randomElement(['Sangat Baik','Baik','Cukup'])
        ];
    }

    
}
