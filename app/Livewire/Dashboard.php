<?php
// filepath: app/Livewire/Dashboard.php

namespace App\Livewire;
use Carbon\Carbon;  
use Livewire\Component;
use App\Models\Patient;
use App\Models\Invoice;
use App\Models\Appointment;
use App\Models\Queue;
use App\Models\Treatment;
use App\Models\Medicine;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class Dashboard extends Component
{
    public $totalPatients;

    public $todayPatients;
    public $totalInvoices;
    public $pendingQueues;
    public $totalTreatments;
    public $todayRevenue;
    public $monthlyRevenue;
    public $monthlyCount;

    public $todayAppointments;

    public $totalMedicines;

    public $todayGrouped = [];

    public $monthlyAppointments = [];
    public function mount()
    {
        $this->monthlyCount = Appointment::whereMonth('scheduled_at', now()->month)
        ->whereYear('scheduled_at', now()->year)
        ->count();

        $this->todayPatients = Patient::whereDate('created_at', now())->count();
        $this->totalPatients = Patient::count();

        $this->todayAppointments = Appointment::whereDate('scheduled_at', now())->count();


        $this->totalMedicines = Medicine::sum('total_quantity');

        // dd($this->totalMedicines);

$todayGrouped = Invoice::select('price_type')
    ->selectRaw('COUNT(*) as total_invoices')
    ->selectRaw('SUM(total_amount) as total_amount')
    ->where('type', 'consultation_fee')
    ->whereDate('created_at', Carbon::today())
    ->groupBy('price_type')
    ->get();

    // dd($todayGrouped);



 

  
    }



    



    public function render()
    {
        return view('livewire.dashboard.dashboard');
    }
}