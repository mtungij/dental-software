<?php

namespace App\Livewire\Treatment;

use Livewire\Attributes\Computed;
use Livewire\Component;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\TreatmentMaster;

class InvoiceApproval extends Component
{
    public $modalId = 'invoice-modal'; 

    public $invoices;
    public $selectedInvoice = null;
    public $showModal = false;

    public $investigationInvoices;
    public $medicineInvoices;

    public $selectedInvestigationInvoice = null;
    public $selectedMedicineInvoice = null;
    public $selectedInvoiceId = null;

    public $treatments = [];
    public $createdByUser = null;


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
                'type' => ucfirst(str_replace('_', ' ', $type)),
                'price' => $price,
            ];
        })->toArray();

        $this->createdByUser = $invoice->createdByUser ?? null;
        $this->selectedInvestigationInvoice = $invoice;
        $this->showInvestigationModal = true;
    }

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

    public function approvePaymentInvestigation()
    {
        if (!$this->selectedInvestigationInvoice) {
            $this->addError('invoice', 'No investigation invoice selected.');
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

            $this->showInvestigationModal = false;
            $this->selectedInvestigationInvoice = null;

            $this->loadInvoices();
        } catch (\Throwable $e) {
            \DB::rollBack();
            $this->addError('payment', 'Failed to approve payment.');
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
            Payment::create([
                'invoice_id' => $this->selectedMedicineInvoice->id,
                'patient_id' => $this->selectedMedicineInvoice->queue->patient_id,
                'amount' => $this->selectedMedicineInvoice->total_amount,
                'paid_at' => now(),
                'method' => 'cash',
                'user_id' => auth()->id(),
            ]);

            $this->selectedMedicineInvoice->status = 'paid';
            $this->selectedMedicineInvoice->save();

            \DB::commit();

            session()->flash('success', 'Medicine payment approved.');

            $this->showMedicineModal = false;
            $this->selectedMedicineInvoice = null;

            $this->loadInvoices();
        } catch (\Throwable $e) {
            \DB::rollBack();
            $this->addError('payment', 'Failed to approve payment.');
        }
    }

    public function viewInvoice($invoiceId)
    {
        $this->selectedInvoiceId = $invoiceId;
        $this->loadSelectedInvoice();
        $this->showModal = true;
    }

    public function testClick()
{
    logger('Test click triggered');
}

 
public function approveMedicinePayment($invoiceId)
{
    $invoice = Invoice::with('queue.patient')->find($invoiceId);
    if (!$invoice) {
        $this->addError('invoice', 'Medicine invoice not found.');
        return;
    }

    \DB::beginTransaction();
    try {
        Payment::create([
            'invoice_id' => $invoice->id,
            'patient_id' => $invoice->queue->patient_id,
            'amount' => $invoice->total_amount,
            'paid_at' => now(),
            'method' => 'cash',
            'user_id' => auth()->id(),
        ]);

        $invoice->status = 'paid';
        $invoice->save();

        \DB::commit();

        session()->flash('success', 'Medicine payment approved.');

        $this->loadInvoices();

        // Redirect to PDF print route (adjust route as you have)
        return redirect()->route('invoice.medicine.print', ['id' => $invoice->id]);

    } catch (\Throwable $e) {
        \DB::rollBack();
        $this->addError('payment', 'Failed to approve payment.');
        logger()->error('Medicine payment approval failed: '.$e->getMessage());
    }
}

public function approveInvestigationPayment($invoiceId)
{
    $invoice = Invoice::with('queue.patient')->find($invoiceId);
    if (!$invoice) {
        $this->addError('invoice', 'Investigation invoice not found.');
        return;
    }

    \DB::beginTransaction();
    try {
        Payment::create([
            'invoice_id' => $invoice->id,
            'patient_id' => $invoice->queue->patient_id,
            'amount' => $invoice->total_amount,
            'paid_at' => now(),
            'method' => 'cash',
            'user_id' => auth()->id(),
        ]);

        $invoice->status = 'paid';
        $invoice->save();

        \DB::commit();

        session()->flash('success', 'Investigation payment approved.');

        $this->loadInvoices();

        // Redirect to PDF print route (adjust route as you have)
        return redirect()->route('invoice.investigation.print', ['id' => $invoice->id]);

    } catch (\Throwable $e) {
        \DB::rollBack();
        $this->addError('payment', 'Failed to approve payment.');
        logger()->error('Investigation payment approval failed: '.$e->getMessage());
    }
}

    public function mount()
    {
        $this->loadInvoices();
    }

    public function loadInvoices()
    {
        $this->investigationInvoices = Invoice::with(['queue.patient'])
            ->where('status', 'invoice_created')
            ->latest()
            ->get()
            ->map(function ($invoice) {
                if (is_string($invoice->treatments)) {
                    $decoded = json_decode($invoice->treatments ?? '[]', true);
                    $invoice->treatments = is_array($decoded) ? $decoded : [];
                } elseif (!is_array($invoice->treatments)) {
                    $invoice->treatments = [];
                }
                return $invoice;
            });

        $this->medicineInvoices = Invoice::with(['queue.patient', 'invoiceItems.medicine'])
            ->where('price_type', 'medicine')
            ->latest()
            ->get()
            ->map(function ($invoice) {
                if (is_string($invoice->treatments)) {
                    $decoded = json_decode($invoice->treatments ?? '[]', true);
                    $invoice->treatments = is_array($decoded) ? $decoded : [];
                } elseif (!is_array($invoice->treatments)) {
                    $invoice->treatments = [];
                }
                return $invoice;
            });
    }

    #[Computed]
    public function investigationInvoices()
    {
       return Invoice::with(['queue.patient'])
        ->whereHas('queue', function ($query) {
            $query->where('status', 'invoice_created');
        })
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
                    'price_type' => $priceType,
                ];
            })->values();

            return $invoice;
        });
    }

    public function render()
    {
        // Load invoices fresh each render
        $investigationInvoices = $this->investigationInvoices();

        $medicineInvoices = Invoice::with(['queue.patient', 'invoiceItems.medicine'])
            ->where('price_type', 'medicine')
            ->latest()
            ->get()
            ->map(function ($invoice) {
                if (is_string($invoice->treatments)) {
                    $decoded = json_decode($invoice->treatments ?? '[]', true);
                    $invoice->treatments = is_array($decoded) ? $decoded : [];
                } elseif (!is_array($invoice->treatments)) {
                    $invoice->treatments = [];
                }
                return $invoice;
            });

        return view('livewire.treatment.invoice-approval', [
            'investigationInvoices' => $investigationInvoices,
            'medicineInvoices' => $medicineInvoices,
        ]);
    }
}
