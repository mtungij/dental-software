<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medicine;
class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */public function run()
    {
        $medicines = [
            [
                'name' => 'Paracetamol 500mg',
                'description' => 'Pain reliever and fever reducer',
                'buy_price' => 0.20,
                'sell_price' => 0.50,
                'stock_limit' => 50,
                'quantity_per_container' => 20,
                'total_quantity' => 200,
                'container' => 'Box',
            ],
            [
                'name' => 'Amoxicillin 250mg',
                'description' => 'Antibiotic for bacterial infections',
                'buy_price' => 0.50,
                'sell_price' => 1.00,
                'stock_limit' => 30,
                'quantity_per_container' => 10,
                'total_quantity' => 100,
                'container' => 'Box',
            ],
            [
                'name' => 'Ibuprofen 400mg',
                'description' => 'Anti-inflammatory and pain relief',
                'buy_price' => 0.30,
                'sell_price' => 0.70,
                'stock_limit' => 40,
                'quantity_per_container' => 15,
                'total_quantity' => 150,
                'container' => 'Box',
            ],
            [
                'name' => 'Dental Floss',
                'description' => 'Used to remove plaque and food particles',
                'buy_price' => 0.80,
                'sell_price' => 1.50,
                'stock_limit' => 20,
                'quantity_per_container' => 1,
                'total_quantity' => 50,
                'container' => 'Pack',
            ],
            [
                'name' => 'Mouthwash 250ml',
                'description' => 'Antiseptic mouth rinse for oral hygiene',
                'buy_price' => 2.00,
                'sell_price' => 3.50,
                'stock_limit' => 10,
                'quantity_per_container' => 1,
                'total_quantity' => 20,
                'container' => 'Bottle',
            ],
            [
                'name' => 'Local Anesthetic (Lidocaine 2%)',
                'description' => 'Used for numbing during dental procedures',
                'buy_price' => 5.00,
                'sell_price' => 10.00,
                'stock_limit' => 5,
                'quantity_per_container' => 1,
                'total_quantity' => 10,
                'container' => 'Cartridge',
            ],
            [
                'name' => 'Hydrogen Peroxide 3%',
                'description' => 'Used for oral cleaning and disinfecting',
                'buy_price' => 1.00,
                'sell_price' => 2.00,
                'stock_limit' => 10,
                'quantity_per_container' => 1,
                'total_quantity' => 15,
                'container' => 'Bottle',
            ],
        ];

        foreach ($medicines as $medicine) {
            Medicine::create($medicine);
        }
    }
}
