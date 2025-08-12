<?php

namespace App\Livewire\Reports;

use Livewire\Component;
use App\Models\Invoice;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class ConsultationReport extends Component
{
    public $todayConsultations;
      public $priceType = 'all'; // filter
    public $selectedDate;  
       public $consultations;
  public function mount()
    {
        $this->selectedDate = Carbon::today()->toDateString();
        $this->loadConsultations();
    }

    public function updatedPriceType()
    {
        $this->loadConsultations();
    }

    public function updatedSelectedDate()
    {
        $this->loadConsultations();
    }

    public function loadConsultations()
    {
        $query = Invoice::with('patient')
            ->where('type', 'consultation_fee')
            ->whereDate('created_at', $this->selectedDate);

        if ($this->priceType !== 'all') {
            $query->where('price_type', $this->priceType);
        }

        $this->consultations = $query->orderBy('price_type')->get();
    }

    public function generateReport()
    {
        $pdf = Pdf::loadView('livewire.reports.consultation-report-pdf', [
            'consultations' => $this->consultations,
            'date' => $this->selectedDate,
            'priceType' => $this->priceType,
        ]);

        return response()->streamDownload(
            fn() => print($pdf->output()),
            'consultation_report_' . $this->selectedDate . '.pdf'
        );
    }

    public function render()
    {
        return view('livewire.reports.consultation-report', [
             'consultations' => $this->consultations,
        ]);
    }
}
