<?php

namespace App\Livewire\Patients;

use Livewire\Component;
use App\Models\Patient;

class Index extends Component
{

    public $patients;
 public $confirmingDeleteId = null;

    public function deletePatient($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        session()->flash('success', 'Patient deleted successfully.');
    }

    public function mount()
    {
        // Fetch patients from the database
          $this->patients = Patient::all();

        //   dd($this->patients);
    }
    public function render()
    {
        return view('livewire.patients.index');
    }
}
