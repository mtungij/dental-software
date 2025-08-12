<?php

namespace App\Livewire\Treatment;

use Livewire\Component;
use App\Models\VitalSign;

class DentalVitalSignsForm extends Component
{ public $queue_id;

    public $vitals = [
        'temperature' => null,
        'blood_pressure' => null,
        'heart_rate' => null,
     
    ];





    public function render()
    {
        return view('livewire.treatment.dental-vital-signs-form');
    }
}
