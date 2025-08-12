<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TreatmentMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run()
    {
        $treatments = [
            ['name' => 'Consultation fee', 'price' => 5000, 'fast_track_price' => 7500, 'description' => null],
            ['name' => 'Dental Check Up', 'price' => 10000, 'fast_track_price' => 15000, 'description' => null],
            ['name' => 'Tooth Extraction', 'price' => 10000, 'fast_track_price' => 15000, 'description' => null],
            ['name' => 'Tooth Extraction(Child) Under Five', 'price' => 5000, 'fast_track_price' => 7500, 'description' => null],
            ['name' => 'Extraction Of Impacted Tooth', 'price' => 25000, 'fast_track_price' => 37500, 'description' => null],
            ['name' => 'Tooth Filling Permanent', 'price' => 30000, 'fast_track_price' => 45000, 'description' => null],
            ['name' => 'Tooth Filling Temporary', 'price' => 15000, 'fast_track_price' => 22500, 'description' => null],
            ['name' => 'Root Canal Treatment(Anterior)', 'price' => 80000, 'fast_track_price' => 100000, 'description' => null],
            ['name' => 'Root Canal Treatment (Posterior)', 'price' => 100000, 'fast_track_price' => 125000, 'description' => null],
            ['name' => 'Incision Of Small Abscess', 'price' => 30000, 'fast_track_price' => 45000, 'description' => null],
            ['name' => 'Incision And Drainage Of Large Abscess', 'price' => 100000, 'fast_track_price' => 125000, 'description' => null],
            ['name' => 'Dental X Ray', 'price' => 10000, 'fast_track_price' => 15000, 'description' => null],
            ['name' => 'Partial Denture', 'price' => 40000, 'fast_track_price' => 60000, 'description' => null],
            ['name' => 'Scaling And Polishing Upper And Lower Per Jaw', 'price' => 35000, 'fast_track_price' => 52500, 'description' => null],
            ['name' => 'Tooth Whitening Per Teeth', 'price' => 30000, 'fast_track_price' => 45000, 'description' => null],
            ['name' => 'Fixed Orthodontic Treatment Per Jaw(Braces)', 'price' => 500000, 'fast_track_price' => 750000, 'description' => null],
            ['name' => 'Denture', 'price' => 40000, 'fast_track_price' => 50000, 'description' => null],
            ['name' => 'Gingivectomy Per Tooth', 'price' => 20000, 'fast_track_price' => 30000, 'description' => null],
            ['name' => 'Fracture Fixation', 'price' => 100000, 'fast_track_price' => 125000, 'description' => null],
            ['name' => 'Tongue Tie', 'price' => 10000, 'fast_track_price' => 15000, 'description' => null],
            ['name' => 'Crown Acrylic', 'price' => 80000, 'fast_track_price' => 120000, 'description' => null],
            ['name' => 'Crown Ceramic', 'price' => 300000, 'fast_track_price' => 375000, 'description' => null],
            ['name' => 'Intermaxillary Fixation', 'price' => 150000, 'fast_track_price' => 187500, 'description' => null],
            ['name' => 'Splinting Per Tooth', 'price' => 60000, 'fast_track_price' => 75000, 'description' => null],
            ['name' => 'Dry Socket', 'price' => 15000, 'fast_track_price' => 22500, 'description' => null],
            ['name' => 'Dressing Of Infected Socket', 'price' => 10000, 'fast_track_price' => 15000, 'description' => null],
            ['name' => 'Diastema Formation', 'price' => 10000, 'fast_track_price' => 15000, 'description' => null],
            ['name' => 'Diastema Closure', 'price' => 40000, 'fast_track_price' => 60000, 'description' => null],
            ['name' => 'Denture Repair', 'price' => 15000, 'fast_track_price' => 22500, 'description' => null],
            ['name' => 'Dental Stones Per Tooth', 'price' => 15000, 'fast_track_price' => 22500, 'description' => null],
            ['name' => 'Suture Simple (Simple Traumatic Dental Injuries)', 'price' => 20000, 'fast_track_price' => 30000, 'description' => null],
            ['name' => 'Salivary Gland Treatment', 'price' => 30000, 'fast_track_price' => 45000, 'description' => null],
            ['name' => 'Veneer Per Tooth', 'price' => 20000, 'fast_track_price' => 30000, 'description' => null],
            ['name' => 'Dental Cystectomy', 'price' => 150000, 'fast_track_price' => 187500, 'description' => null],
            ['name' => 'Dental Tumor Excision', 'price' => 200000, 'fast_track_price' => 300000, 'description' => null],
            ['name' => 'Jaw Reduction', 'price' => 15000, 'fast_track_price' => 22500, 'description' => null],
            ['name' => 'Immobilization Of Tooth ( 8 Figure )', 'price' => 15000, 'fast_track_price' => 22500, 'description' => null],
            ['name' => 'Removal Of Braces', 'price' => 20000, 'fast_track_price' => 30000, 'description' => null],
            ['name' => 'Cleanness Of Braces', 'price' => 20000, 'fast_track_price' => 30000, 'description' => null],
        ];

        DB::table('treatment_masters')->insert($treatments);
    }
}

