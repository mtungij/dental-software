<?php

namespace App\Livewire\Reports;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\TreatmentMaster;
use Barryvdh\DomPDF\Facade\Pdf;

class Consultations extends Component
{
       public $from_date;
    public $to_date;

    public $totalInvoices;

       public function mount()
    {
        // Default to today
        $this->from_date = Carbon::today()->format('Y-m-d');
        $this->to_date = Carbon::today()->format('Y-m-d');
        $this->filterInvoices();
    }

    public function filterInvoices()
    {
        if ($this->from_date && $this->to_date && $this->from_date > $this->to_date) {
            $this->addError('date_error', 'From Date cannot be after To Date.');
            return;
        }

        $query = Invoice::with(['queue.patient', 'patient'])
            ->where('type', 'consultation_fee')
            ->where('status', 'paid');

        if ($this->from_date && $this->to_date) {
            $query->whereBetween('updated_at', [
                Carbon::parse($this->from_date)->startOfDay(),
                Carbon::parse($this->to_date)->endOfDay(),
            ]);
        }

        $this->totalInvoices = $query->latest()->get();
    }

    #[\Livewire\Attributes\Computed]
    public function getTotalAmountProperty()
    {
        return $this->totalInvoices->sum('total_amount');
    }

    public function resetFilters()
    {
        $this->from_date = Carbon::today()->format('Y-m-d');
        $this->to_date = Carbon::today()->format('Y-m-d');
        $this->filterInvoices();
        $this->resetErrorBag();
    }


public function downloadPdf()
{
    $data = [
        'invoices' => $this->totalInvoices ?? collect(),
        'from_date' => $this->from_date,
        'to_date' => $this->to_date,
        'totalAmount' => $this->totalAmount,
    ];

    $pdf = Pdf::loadView('livewire.reports.consultation-pdf', $data)
        ->setPaper('a4', 'portrait');

    return response()->streamDownload(
        fn () => print($pdf->output()),
        'ConsultationFees_' . now()->format('Y-m-d_H-i') . '.pdf'
    );
}
    public function render()
    {
        return view('livewire.reports.consultations');
    }
}
