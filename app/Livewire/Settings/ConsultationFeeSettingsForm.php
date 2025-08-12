<?php

namespace App\Livewire\Settings;

use Livewire\Component;
use App\Models\ConsultationFeeSetting;

class ConsultationFeeSettingsForm extends Component
{


    public $standard_fee;
    public $fast_track_fee;
public $fees;
   
    public function mount()
    {
        $this->fees = ConsultationFeeSetting::first();
    }


    protected $rules = [
        'standard_fee' => 'required|numeric|min:0',
        'fast_track_fee' => 'required|numeric|min:0',
    ];

    public function save()
    {
        $this->validate();

        ConsultationFeeSetting::updateOrCreate(
            ['id' => 1], // always use single row
            [
                'standard_fee' => $this->standard_fee,
                'fast_track_fee' => $this->fast_track_fee,
            ]
        );

        session()->flash('message', 'Consultation fees updated successfully.');
    }

    public function render()
    {
        return view('livewire.settings.consultation-fee-settings-form');
    }
}
