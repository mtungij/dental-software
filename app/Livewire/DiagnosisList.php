<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Queue;
use Carbon\Carbon;

class DiagnosisList extends Component
{
    public $queues = [];

   public function mount()
{
    $this->queues = Queue::with('patient')
        ->where('status', 'diagnosing')  // corrected here
        ->orderBy('updated_at', 'desc')
        ->get();

        // dd($this->queues);
}


public function callPatient($patientName)
{
    $this->js(<<<"JS"
        window.dispatchEvent(new CustomEvent('call-patient', {
            detail: { name: "{$patientName}" }
        }))
    JS);
}




    public function startTreatment($queueId)
    {
        return redirect()->route('start-treatment', ['queue' => $queueId]);
    }

    public function render()
    {
        return view('livewire.diagnosis-list');
    }
}
