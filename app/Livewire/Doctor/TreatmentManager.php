<?php

namespace App\Livewire\Doctor;
use Livewire\Component;
use App\Models\Queue;
use App\Models\TreatmentMaster; // your treatments catalog/model
use Carbon\Carbon;


class TreatmentManager extends Component
{


    public $queueId;
    public $queuePatient; // queue entry with patient relation
    public $treatments = [];
    public $selectedTreatments = []; // e.g. ['treatment_id' => qty]

    public function mount()
    {
        $this->loadPatients();
    }

    public function loadPatients()
    {
        $this->queuePatient = null;
    }

    public function selectPatient($queueId)
    {
        $this->queueId = $queueId;
        $this->queuePatient = Queue::with('patient')->find($queueId);
        $this->selectedTreatments = [];
    }

    public function addTreatment($treatmentId)
    {
        if(isset($this->selectedTreatments[$treatmentId])) {
            $this->selectedTreatments[$treatmentId]++;
        } else {
            $this->selectedTreatments[$treatmentId] = 1;
        }
    }

    public function submitInvoice()
    {
        // Create invoice and link to queue/patient here (simplified)
        // Change queue status to pending_payment
        if (!$this->queuePatient) {
            session()->flash('error', 'No patient selected.');
            return;
        }

        $this->queuePatient->update(['status' => 'pending_payment']);

        // Normally you’d create invoice records here...

        session()->flash('success', 'Invoice sent to reception for payment.');
        $this->reset('queueId', 'queuePatient', 'selectedTreatments');
    }

    public function render()
    {
        $queueDiagnosing = Queue::with('patient')
            ->where('queue_date', Carbon::today())
            ->where('status', 'diagnosing')
            ->get();

        $treatments = TreatmentMaster::all();

        return view('livewire.doctor.treatment-manager', [
            'queueDiagnosing' => $queueDiagnosing,
            'treatments' => $treatments,
        ]);
    }
    
}
