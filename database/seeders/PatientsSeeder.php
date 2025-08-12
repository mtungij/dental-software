<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;


class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        Patient::factory()->count(50)->create();
    }
}
