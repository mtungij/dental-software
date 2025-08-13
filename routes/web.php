<?php

use App\Livewire\Components;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Treatment\PatientDashboard;
use Illuminate\Support\Facades\Route;

use App\Livewire\Patients\Index;
use App\Livewire\Patients\Create;
use App\Livewire\Patients\Edit;
use App\Livewire\Medicine\ManageMedicine;

use App\Livewire\Reception\QueueManager;
use App\Livewire\Dashboard;

use App\Livewire\Doctor\TreatmentManager;
use App\Livewire\Treatment\CreateTreatment;
use App\Livewire\DiagnosisList;
use App\Livewire\Treatment\InvoiceApproval;
use App\Livewire\Treatment\ViewInvoice;
use App\Livewire\Calender;
use App\Livewire\Settings\ConsultationFeeSettingsForm;
use App\Livewire\Reports\ConsultationReport;
use App\Livewire\Users\ListUsers;
use App\Livewire\Users\UserCreate ;
  

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;




Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'permission:dashboard'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});

Route::middleware(['auth', 'permission:consultation-fees'])->group(function () {
    Route::get('/consultation-fees', ConsultationFeeSettingsForm::class)->name('consultation-fees');
});

Route::middleware(['auth'])->group(function () {
    // If you want to allow everyone authenticated to access these files:
    Route::get('/invoices/pdf/{filename}', function ($filename) {
        $path = storage_path('app/invoices/' . $filename);

        if (!\Illuminate\Support\Facades\File::exists($path)) {
            abort(404);
        }

        return response()->file($path);
    });
});

Route::middleware(['auth', 'permission:consultation.payment'])->group(function () {
    Route::get('/consultation/payment', ConsultationReport::class)->name('consultation.payment');
});

Route::middleware(['auth', 'permission:queue.manage'])->group(function () {
    Route::get('/reception/queue', QueueManager::class)->name('queue.manage');
});

Route::middleware(['auth', 'permission:treatments.manage'])->group(function () {
    Route::get('/treatments', TreatmentManager::class)->name('treatments.manage');
});

Route::middleware(['auth', 'permission:appointments.calendar'])->group(function () {
    Route::get('/appointments/calendar', Calender::class)->name('appointments.calendar');
});

Route::middleware(['auth', 'permission:treatment.manage'])->group(function () {
    Route::get('/treatment', CreateTreatment::class)->name('treatment.manage');
});

Route::middleware(['auth', 'permission:diagnosis.patients'])->group(function () {
    Route::get('/diagnosis-patients', DiagnosisList::class)->name('diagnosis.patients');
});

Route::middleware(['auth', 'permission:start-treatment'])->group(function () {
    Route::get('/treatment/{queue}', PatientDashboard::class)->name('start-treatment');
});

Route::middleware(['auth', 'permission:treatment.approval'])->group(function () {
    Route::get('/approval', InvoiceApproval::class)->name('treatment.approval');
});

  Route::get('/approval/invoice/investigation/print/{id}', [InvoiceApproval::class, 'printInvestigation'])
        ->name('invoice.investigation.print');

            Route::get('/invoice/medicine/print/{id}', [InvoiceApproval::class, 'printMedicine'])
        ->name('invoice.medicine.print');

Route::middleware(['auth', 'permission:invoice.print'])->group(function () {
    Route::get('/invoice/print/{id}', InvoiceApproval::class)->name('invoice.print');
});

Route::middleware(['auth', 'permission:invoices.print'])->group(function () {
    Route::get('/invoices/{id}/print', InvoiceApproval::class)->name('invoices.print');
});

Route::middleware(['auth', 'permission:invoices.pdf'])->group(function () {
    Route::get('/invoices/{id}/pdf', InvoiceApproval::class)->name('invoices.pdf');
});

Route::middleware(['auth', 'permission:medicines.manage'])->group(function () {
    Route::get('/medicines', ManageMedicine::class)->name('medicines.manage');
});

Route::middleware(['auth', 'permission:users.create'])->group(function () {
    Route::get('/users/create', UserCreate::class)->name('users.create');
});

Route::middleware(['auth', 'permission:users.list'])->group(function () {
    Route::get('/users/lists', ListUsers::class)->name('users.list');
});

    Route::middleware(['auth'])->prefix('patients')->name('patients.')->group(function () {
        Route::get('/', Index::class)->name('index');
        Route::get('/create', Create::class)->name('create');
        Route::get('/{patient}/edit', Edit::class)->name('edit');
});


    Route::middleware(['auth'])->group(function () {
    Route::get('/ui-components', Components::class)->name('components');
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
