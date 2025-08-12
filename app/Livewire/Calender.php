<?php

namespace App\Livewire;
use App\Models\Appointment;
use Livewire\Component;

  use Carbon\Carbon;

class Calender extends Component
{
    public $appointments;



public function mount()
{
   
    $this->appointments = Appointment::whereMonth('scheduled_at', now()->month)
        ->whereYear('scheduled_at', now()->year)
        ->with('patient')
        ->get();
    // dd($this->appointments);
}


    public function render()
    {
        return view('livewire.calender', [
           
        ]);
    }



}
