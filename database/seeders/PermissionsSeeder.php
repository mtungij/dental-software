<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    $permissionsWithLabels = [
        'dashboard' => 'Set Dashboard',
        'consultation-fees' => 'Set Consultation Fees',
        'consultation.payment' => 'Set Consultation Payment',
        'queue.manage' => 'Set Manage Queue',
        'treatments.manage' => 'Set Manage Treatments',
        'appointments.calendar' => 'Set Appointments Calendar',
        'treatment.manage' => 'Manage Treatment',
        'diagnosis.patients' => 'Patient Diagnosis',
        'start-treatment' => 'Start Treatment',
        'treatment.approval' => 'Payment Approval',
        'invoice.print' => 'Print Invoice',
        'invoices.print' => 'Print Invoices',
        'invoices.pdf' => 'Download Invoice PDF',
        'medicines.manage' => 'Manage Medicines',
        'users.create' => 'Create Users',
        'users.list' => 'List Users',
    ];

    foreach ($permissionsWithLabels as $name => $label) {
        Permission::updateOrCreate(
            ['name' => $name],
            ['label' => $label]
        );
    }

    // Create admin user if not exists
    $user = User::firstOrCreate(
        ['email' => 'admin@gmail.com'], // Change email as needed
        [
            'name' => 'Admin User',
            'password' => bcrypt('password123'), // Change password as needed
        ]
    );

    // Assign all permissions to admin user
    $user->syncPermissions(array_keys($permissionsWithLabels));

    $this->command->info('Permissions with labels created and admin user assigned all permissions.');
}
}