<?php

namespace App\Livewire\Treatment;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\TreatmentMaster;
use Carbon\Carbon;

class InvoiceApproval extends Component
{
    // Modal states
    public $showInvestigationModal = false;
    public $showMedicineModal = false;

    // Selected invoices
    public $selectedInvestigationInvoice = null;
    public $selectedMedicineInvoice = null;

    // Treatment items for investigation
    public $treatments = [];
    public $createdByUser = null;


    public $showTotalsModal = false;
public $totalModalType = null; // 'investigation', 'medicine', or 'consultation'
public $totalInvoices = []; 

    /**
     * Load all pending invoices
     */
    public function loadInvoices()
    {
        $this->investigationInvoices = $this->getInvestigationInvoices();
        $this->medicineInvoices = $this->getMedicineInvoices();
    }


    #[Computed]
public function getTotalInvestigationPaidTodayProperty()
{
    return Invoice::where('type', 'Investigation')
        ->where('status', 'paid')
        ->whereDate('updated_at', now()->toDateString())
        ->sum('total_amount');
     
}


#[Computed]
public function getTotalConsultationPaidTodayProperty()
{
    return Invoice::where('type', 'consultation_fee')
        ->where('status', 'paid')
        ->whereDate('updated_at', now()->toDateString())
        ->sum('total_amount');
}

#[Computed]
public function getTotalMedicinePaidTodayProperty()
{
    return Invoice::where('price_type', 'medicine')
        ->where('status', 'paid')
        ->whereDate('updated_at', now()->toDateString())
        ->sum('total_amount');
}

public function viewTotalInvoices($type)
{
    $this->totalModalType = $type;

    if ($type === 'investigation') {
        $this->totalInvoices = Invoice::with('queue.patient')
            ->where('type', 'investigation')
            ->where('status', 'paid')
            ->whereDate('updated_at', now()->toDateString())
            ->get()
            ->map(function($invoice) {
                // Decode treatments
                $treatments = is_string($invoice->treatments) 
                    ? json_decode($invoice->treatments, true) 
                    : ($invoice->treatments ?? []);
                
                $treatmentMasters = TreatmentMaster::whereIn('id', array_keys($treatments))->get()->keyBy('id');
                
                $invoice->treatmentDetails = collect($treatments)->map(function($priceType, $id) use ($treatmentMasters) {
                    $tm = $treatmentMasters->get($id);
                    return [
                        'name' => $tm?->name,
                        'price_type' => $priceType,
                        'price' => $tm?->$priceType,
                    ];
                })->toArray();

                return $invoice;
            });
    } elseif ($type === 'medicine') {
        $this->totalInvoices = Invoice::with('queue.patient', 'invoiceItems.medicine')
            ->where('price_type', 'medicine')
            ->where('status', 'paid')
            ->whereDate('updated_at', now()->toDateString())
            ->get();
    }  elseif ($type === 'consultation') {
    $this->totalInvoices = Invoice::with('queue.patient', 'patient')
        ->where('type', 'consultation_fee')
        ->where('status', 'paid')
        ->whereDate('updated_at', now()->toDateString())
        ->get();
    }

    $this->showTotalsModal = true;
}



public function filterInvoices($type)
{
    if ($type === 'investigation') {
        $this->investigationInvoices = $this->getInvestigationInvoices()->where('status', 'paid');
    } elseif ($type === 'medicine') {
        $this->medicineInvoices = $this->getMedicineInvoices()->where('status', 'paid');
    }
}


 


    /**
     * View Investigation Invoice (modal)
     */
    public function viewInvestigationInvoice($invoiceId)
    {
        $invoice = Invoice::with('queue.patient')->find($invoiceId);
        if (!$invoice) {
            $this->addError('invoice', 'Investigation invoice not found.');
            return;
        }

        $treatmentItems = $invoice->treatments;
        if (is_string($treatmentItems)) {
            $treatmentItems = json_decode($treatmentItems, true);
        }
        if (!is_array($treatmentItems)) {
            $treatmentItems = [];
        }

        $treatmentMasters = TreatmentMaster::whereIn('id', array_keys($treatmentItems))->get();

        $this->treatments = $treatmentMasters->map(function ($tm) use ($treatmentItems) {
            $type = $treatmentItems[$tm->id] ?? 'standard';
            $price = $type === 'fast_track_price' ? $tm->fast_track_price : $tm->price;

            return [
                'name' => $tm->name,
                'type' => $type === 'fast_track_price' ? 'Fast Track Patient' : 'Standard Patient',
                'price' => $price,
            ];
        })->toArray();

        $this->createdByUser = $invoice->createdByUser ?? null;
        $this->selectedInvestigationInvoice = $invoice;
        $this->showInvestigationModal = true;
    }

    /**
     * View Medicine Invoice (modal)
     */
    public function viewMedicineInvoice($invoiceId)
    {
        $invoice = Invoice::with('queue.patient', 'invoiceItems.medicine')->find($invoiceId);
        if (!$invoice) {
            $this->addError('invoice', 'Medicine invoice not found.');
            return;
        }

        $this->selectedMedicineInvoice = $invoice;
        $this->showMedicineModal = true;
    }

    /**
     * Approve Investigation Payment
     */
public function approvePaymentInvestigation()
{
    if (!$this->selectedInvestigationInvoice) {
        session()->flash('error', 'No investigation invoice selected.');
        return;
    }

    \DB::beginTransaction();
    try {
        Payment::create([
            'invoice_id' => $this->selectedInvestigationInvoice->id,
            'patient_id' => $this->selectedInvestigationInvoice->queue->patient_id,
            'amount' => $this->selectedInvestigationInvoice->total_amount,
            'paid_at' => now(),
            'method' => 'cash',
            'user_id' => auth()->id(),
        ]);

        $this->selectedInvestigationInvoice->status = 'paid';
        $this->selectedInvestigationInvoice->save();

        \DB::commit();

        session()->flash('success', 'Investigation payment approved.');

        $invoiceId = $this->selectedInvestigationInvoice->id;
        $this->selectedInvestigationInvoice = null;
        $this->showInvestigationModal = false;
        $this->loadInvoices();

        // Open PDF in new tab
        $this->dispatchBrowserEvent('open-pdf', [
            'url' => route('invoice.investigation.print', ['id' => $invoiceId])
        ]);

    } catch (\Throwable $e) {
        \DB::rollBack();
        logger()->error('Investigation payment failed: ' . $e->getMessage());
        session()->flash('error', 'Failed to approve payment.');
    }
}


public function approvePaymentMedicine()
{
    if (!$this->selectedMedicineInvoice) {
        $this->addError('invoice', 'No medicine invoice selected.');
        return;
    }

    \DB::beginTransaction();
    try {
        // 1. Create Payment record
        Payment::create([
            'invoice_id' => $this->selectedMedicineInvoice->id,
            'patient_id' => $this->selectedMedicineInvoice->queue->patient_id,
            'amount' => $this->selectedMedicineInvoice->total_amount,
            'paid_at' => now(),
            'method' => 'cash',
            'user_id' => auth()->id(),
        ]);

        // 2. Reduce stock for each medicine in invoice
        foreach ($this->selectedMedicineInvoice->invoiceItems as $item) {
            $medicine = $item->medicine; // relation to medicine
            if ($medicine) {
                $medicine->total_quantity -= $item->quantity;

                // Prevent negative stock
                if ($medicine->total_quantity < 0) {
                    $medicine->total_quantity = 0;
                }

                $medicine->save();
            }
        }

        // 3. Mark invoice as paid
        $this->selectedMedicineInvoice->status = 'paid';
        $this->selectedMedicineInvoice->save();

        \DB::commit();

        session()->flash('success', 'Medicine payment approved and stock updated.');

        // Close modal and reset
        $this->showMedicineModal = false;
        $this->selectedMedicineInvoice = null;

        // Refresh invoices
        $this->loadInvoices();

    } catch (\Throwable $e) {
        \DB::rollBack();
        logger()->error('Medicine payment failed: ' . $e->getMessage());
        session()->flash('error', 'Failed to approve payment.');
    }
}



#[Computed]
public function getMedicineInvoicesProperty()
{
    return Invoice::with(['queue.patient', 'invoiceItems.medicine'])
        ->where('price_type', 'medicine')
        ->where(function($query) {
            $query->where('status', 'invoice_created')
                  ->orWhere('status', 'paid'); // include paid invoices
        })
        ->latest()
        ->get();
}


public function isPaid($invoiceId)
{
    $invoice = collect($this->investigationInvoices)->firstWhere('id', $invoiceId);
    return $invoice?->status === 'paid';
}

public function printMedicine($id)
{
    $invoice = Invoice::with(['queue.patient', 'invoiceItems.medicine'])->findOrFail($id);

    return view('livewire.treatment.medicine-print', compact('invoice'));
}


public function printInvestigation($id)
{
    $invoice = Invoice::with('queue.patient')->findOrFail($id);

    // Decode treatments JSON
    $treatmentItems = is_string($invoice->treatments) 
        ? json_decode($invoice->treatments, true) 
        : $invoice->treatments ?? [];

    // Load TreatmentMaster data
    $treatmentMasters = TreatmentMaster::whereIn('id', array_keys($treatmentItems))->get()->keyBy('id');

    // Prepare treatments array for the view
    $treatments = collect($treatmentItems)->map(function ($priceType, $treatmentId) use ($treatmentMasters) {
        $treatment = $treatmentMasters->get($treatmentId);
        return [
            'name' => $treatment?->name,
            'price' => $treatment?->$priceType,
            'price_type' => $priceType,
        ];
    })->values();

    // Return a Blade view for printing
    return view('livewire.treatment.investigation-print', compact('invoice', 'treatments'));
}


    /**
     * Approve Medicine Payment
     */


    /**
     * Get investigation invoices
     */
  #[Computed]
public function getInvestigationInvoices()
{
    return Invoice::with(['queue.patient'])
        ->whereHas('queue', function ($query) {
            $query->where('status', 'invoice_created');
        })
        ->whereDate('created_at', Carbon::today()) // ⬅️ Only today
        ->latest()
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


    /**
     * Get medicine invoices
     */
  public function getMedicineInvoices()
{
    return Invoice::with(['queue.patient', 'invoiceItems.medicine'])
        ->where('price_type', 'medicine')
        ->whereDate('created_at', Carbon::today()) // ⬅️ Only today
        ->latest()
        ->get();
}


    /**
     * Mount & load invoices
     */
    public function mount()
    {
        $this->loadInvoices();
    }

  public function render()
{
    $this->loadInvoices();

    return view('livewire.treatment.invoice-approval', [
        'investigationInvoices' => $this->investigationInvoices,
        'medicineInvoices' => $this->medicineInvoices,
    ]);
}

   
}
