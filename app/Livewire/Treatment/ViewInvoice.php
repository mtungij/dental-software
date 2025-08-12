<?php

namespace App\Livewire\Treatment;

use Livewire\Component;
use App\Models\Invoice;

class ViewInvoice extends Component
{ public $invoice;
    public $invoiceId;

    public function mount($invoiceId = null)
    {
        // Get invoice ID from route parameter or passed parameter
        $id = $invoiceId ?? request()->route('invoice');
        
        $this->invoice = Invoice::with('queue.patient')->findOrFail($id);
        
        // Manually decode if needed
        if (is_string($this->invoice->treatments)) {
            $this->invoice->treatments = json_decode($this->invoice->treatments, true) ?? [];
        }
    }

    public function PrintInvoice($id)
{
    $invoice = Invoice::findOrFail($id);
    return view('livewire.treatment.view-invoice', compact('invoice'));
}

    public function render()
    {
        return view('livewire.treatment.view-invoice');
    }
}
