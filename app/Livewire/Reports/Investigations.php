<?php

namespace App\Livewire\Reports;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\TreatmentMaster;
use Barryvdh\DomPDF\Facade\Pdf;
class Investigations extends Component
{
    public $from_date;
    public $to_date;

    public $filteredInvoices;

    public function mount()
    {
        // By default, show today’s invoices
        $this->from_date = Carbon::today()->format('Y-m-d');
        $this->to_date = Carbon::today()->format('Y-m-d');
        $this->filterInvoices();
    }

    /**
     * Filter invoices based on date range
     */
    public function filterInvoices()
    {
        // Optional: Validate date inputs
        if ($this->from_date && $this->to_date && $this->from_date > $this->to_date) {
            $this->addError('date_error', 'From Date cannot be after To Date.');
            return;
        }

        $query = Invoice::with(['queue.patient'])
            ->where('type', 'Investigation')
            ->where('status', 'paid');

        if ($this->from_date && $this->to_date) {
            $query->whereBetween('updated_at', [
                Carbon::parse($this->from_date)->startOfDay(),
                Carbon::parse($this->to_date)->endOfDay(),
            ]);
        }

        $this->filteredInvoices = $query->latest()
            ->get()
            ->map(function ($invoice) {
                $decoded = is_string($invoice->treatments)
                    ? json_decode($invoice->treatments ?? '[]', true)
                    : (is_array($invoice->treatments) ? $invoice->treatments : []);

                $treatmentIds = array_keys($decoded);
                $treatments = TreatmentMaster::whereIn('id', $treatmentIds)->get()->keyBy('id');

                $invoice->treatment_names = collect($decoded)->map(function ($priceType, $treatmentId) use ($treatments) {
                    $treatment = $treatments->get($treatmentId);
                    return [
                        'id' => $treatment?->id,
                        'name' => $treatment?->name,
                        'price' => $treatment?->$priceType,
                        'price_type' => $priceType === 'fast_track_price' ? 'Fast Track Patient' : 'Standard Patient',
                    ];
                })->values();

                return $invoice;
            });
    }


   public function downloadPdf()
    {
        $data = [
            'invoices' => $this->filteredInvoices ?? collect(),
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'totalAmount' => $this->totalAmount,
        ];

        $pdf = Pdf::loadView('livewire.reports.investigations-pdf', $data)
            ->setPaper('a4', 'portrait');

        return response()->streamDownload(
            fn () => print($pdf->output()),
            'Investigations_' . now()->format('Y-m-d_H-i') . '.pdf'
        );
    }

    /**
     * Reset filters
     */
    public function resetFilters()
    {
        $this->from_date = Carbon::today()->format('Y-m-d');
        $this->to_date = Carbon::today()->format('Y-m-d');
        $this->filterInvoices();
        $this->resetErrorBag();
    }

    #[Computed]
    public function getTotalAmountProperty()
    {
        return $this->filteredInvoices->sum('total_amount');
    }

    public function render()
    {
        return view('livewire.reports.investigations');
    }
}
