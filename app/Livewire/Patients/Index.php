<?php
namespace App\Livewire\Patients;

use Livewire\Component;
use App\Models\Patient;

class Index extends Component
{
    public $patients;
    public $confirmingDeleteId = null;

    public $editingPatient = null;
public $name, $phone, $patient_number;

    public function mount()
    {
        $this->patients = Patient::all();
    }

    public function confirmDelete($id)
    {
        $this->confirmingDeleteId = $id;
    }

    public function editPatient($id)
{
    $this->editingPatient = Patient::findOrFail($id);
    $this->name = $this->editingPatient->name;
    $this->phone = $this->editingPatient->phone;
    $this->patient_number = $this->editingPatient->patient_number;
}

public function updatePatient()
{
    $this->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'patient_number' => 'required|string|max:50',
    ]);

    $this->editingPatient->update([
        'name' => $this->name,
        'phone' => $this->phone,
        'patient_number' => $this->patient_number,
    ]);

    $this->editingPatient = null;
         $this->confirmingDeleteId = null; // close modal
          $this->dispatch('toastMagic',
        status: 'success',
        title: 'Success!',
        message: 'Patient updated successfully.'
    );

    return redirect(request()->header('Referer'));
}

    public function deletePatient($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        $this->patients = Patient::all(); // refresh table

        $this->confirmingDeleteId = null; // close modal
          $this->dispatch('toastMagic',
        status: 'success',
        title: 'Success!',
        message: 'Patient deleted successfully.'
    );
    }

    public function render()
    {
        return view('livewire.patients.index');
    }
}
