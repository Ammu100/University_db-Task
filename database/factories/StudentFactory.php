<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'student_name' => $this->faker->name,
        'class_teacher_id' => \App\Models\Teacher::all()->random()->id,
        'class' => $this->faker->randomElement(['A', 'B', 'C']),
        'admission_date' => $this->faker->date(),
        'yearly_fees' => $this->faker->numberBetween(1000, 5000), 
        ];
    }
}
