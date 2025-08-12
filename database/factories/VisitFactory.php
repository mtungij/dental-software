<?php

namespace Database\Factories;
use App\Models\Patient; // ✅ Required

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visit>
 */
class VisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
              'patient_id' => Patient::inRandomOrder()->first()->id ?? Patient::factory(),
            'visit_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
             'reason' => $this->faker->sentence(),
            'notes' => $this->faker->sentence(),
        ];
    }
}
