<?php
namespace App\Livewire\Reception;

use Livewire\Component;
use App\Models\Patient;
use App\Models\Queue;
use Carbon\Carbon;

class QueueManager extends Component
{
    public $search = '';
    public $patients = [];

     public $queue = [];

      public function mount()
    {
        $this->loadQueue();
    }


      public function loadQueue()
    {
        $this->queue = Queue::with('patient')
                           ->whereDate('created_at', today())
                           ->orderBy('created_at')
                           ->get();

                           

                           
    }

    public function updatedSearch()
    {
       if (strlen($this->search) >= 2) {
        $this->patients = Patient::where('name', 'like', '%' . $this->search . '%')
                                ->orWhere('phone', 'like', '%' . $this->search . '%')
                                ->limit(10)
                                ->get();
    } else {
        $this->patients = [];
    }

    // dd($this->patients);

    }

   public function addToQueue($patientId)
{
    // Check if patient is already in today's queue
    $existsInQueue = Queue::where('patient_id', $patientId)
                         ->whereDate('created_at', today())
                         ->exists();
    
    if ($existsInQueue) {
   
        $this->dispatch('toastMagic',
            status: 'error',
            title: 'Error!',
            message: 'Patient is already in today\'s queue.'
        );
        $this->reset('search', 'patients');
        $this->loadQueue();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
        return;
    }

    // Add patient to queue
    Queue::create([
        'patient_id' => $patientId,
        'status' => 'waiting', // or whatever default status you use
        'queue_date' => today(), // Add this line
    ]);

    // Clear search and refresh queue
    $this->search = '';
    $this->patients = [];
    $this->loadQueue();
    
    // Dispatch success message

       $this->dispatch('toastMagic',
            status: 'success',
            title: 'Success!',
            message: 'Patient added to queue successfully.',
        );


}


    public function sendToDoctor($queueId)
    {
        $queue = Queue::find($queueId);
      
        if ($queue && $queue->status == 'waiting') {
            $queue->update(['status' => 'diagnosing']);
            session()->flash('success', 'Patient sent to doctor.');
            $this->loadQueue();
        }
    }
    public function render()
    {
        $queueToday = Queue::with('patient')
            ->where('queue_date', Carbon::today())
            ->where('status', 'waiting')
            ->get();

        return view('livewire.reception.queue-manager', [
            'queue' => $queueToday,
        ]);
    }
}
