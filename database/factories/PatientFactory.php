<?php

namespace Database\Factories;

use App\Models\Patient; // ✅ Required
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'patient_number' => $this->faker->unique()->numerify('PT-####'),
            'dob' => $this->faker->date(),
            'address' => $this->faker->address(),
            'medical_history' => $this->faker->paragraph(),
            'allergies' => $this->faker->word(),
        ];
    }
}
