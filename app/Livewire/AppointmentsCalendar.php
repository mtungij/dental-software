<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentsCalendar extends Component
{

    public $appointments = [];

        public function mount()
    {
        $this->appointments = Appointment::with('patient:id,name')
            ->get()
            ->map(fn($a) => [
                'id'    => $a->id,
                'title' => optional($a->patient)->name
                    ? ('Appt: ' . $a->patient->name)
                    : ('Appointment #' . $a->id),
                'start' => Carbon::parse($a->scheduled_at)->toIso8601String(),
            ])
            ->toArray();
    }

    public function render()
    {
        return view('livewire.appointments.calendar', [
            'appointments' => $this->appointments,
        ]);
    }
 
}
