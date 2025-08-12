<?php

namespace App\Livewire\Treatment;

use Livewire\Component;
use App\Models\TreatmentMaster;
use PDF;

class CreateTreatment extends Component
{
    public $name;
    public $price;
    public $fast_track_price;
    public $description;
    public $search = '';

    public $treatmentId = null; // for editing

    protected $rules = [
        'name' => 'required|unique:treatment_masters,name',
        'price' => 'required|numeric|min:0',
        'fast_track_price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
    ];

    public function save()
    {
        // Adjust validation rule for update (ignore current id)
        if ($this->treatmentId) {
            $this->validate([
                'name' => 'required|unique:treatment_masters,name,' . $this->treatmentId,
                'price' => 'required|numeric|min:0',
                'fast_track_price' => 'required|numeric|min:0',
                'description' => 'nullable|string',
            ]);

            $treatment = TreatmentMaster::find($this->treatmentId);
            $treatment->update([
                'name' => $this->name,
                'price' => $this->price,
                'fast_track_price' => $this->fast_track_price,
                'description' => $this->description,
            ]);

            session()->flash('success', 'Treatment updated successfully.');
        } else {
            $this->validate();

            TreatmentMaster::create([
                'name' => $this->name,
                'price' => $this->price,
                'fast_track_price' => $this->fast_track_price,
                'description' => $this->description,
            ]);

            session()->flash('success', 'Treatment created successfully.');
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $treatment = TreatmentMaster::findOrFail($id);
        $this->treatmentId = $treatment->id;
        $this->name = $treatment->name;
        $this->price = $treatment->price;
        $this->fast_track_price = $treatment->fast_track_price;
        $this->description = $treatment->description;
    }

    public function delete($id)
    {
        TreatmentMaster::findOrFail($id)->delete();
        session()->flash('success', 'Treatment deleted successfully.');

        // If we are editing the deleted treatment, reset form
        if ($this->treatmentId === $id) {
            $this->resetForm();
        }
    }

    public function downloadPdf()
{
    $treatments = TreatmentMaster::orderBy('name')->get();

    $pdf = PDF::loadView('livewire.reports.treatments-pdf', compact('treatments'))
              ->setPaper('a4', 'portrait');

    return response()->streamDownload(function() use ($pdf) {
        echo $pdf->output();
    }, 'treatments.pdf');
}

    public function resetForm()
    {
        $this->reset(['name', 'price', 'fast_track_price', 'description', 'treatmentId']);
    }

    public function render()
    {
        return view('livewire.treatment.create-treatment', [
            'treatments' => TreatmentMaster::orderBy('name')->get(),
        ]);
    }
}
