<?php

namespace App\Livewire\Treatment;

use App\Models\Queue;
use Livewire\Component;
use App\Models\Patient;
use App\Models\TreatmentMaster;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Appointment;
use App\Models\VitalSign;
use App\Models\ChiefComplaint;
use App\Models\HistoryOfIllness;
use App\Models\ToothExamination;
use App\Models\FamilySocialHistory;
use App\Models\Medicine;
use App\Models\ReviewOfSystem;
use App\Models\PastMedicalHistory;
use Illuminate\Support\Facades\Auth;


class PatientDashboard extends Component
{

    public $treatmentSearch = '';
public $treatmentResults = [];


    public $selectedQueue;
    public $treatments;

    public $selectedTreatments = [];
    public $totalAmount = 0;

    public $total = 0;

  
public $price_type = null;

public $chiefComplaint = '';

public $selectedTeeth = [];
public $examNotes = '';

public $appointment_date;
public $appointment_notes = '';

public $family_social_history;

public $scheduled_at;

public $patient_id;
public $historyOfIllness;


    
 protected $listeners = ['calculateTotal'];

    public $activeTab;

    public $oral_hygiene = '';
public $gum_condition = '';
public $tooth_decay = [];
public $missing_teeth = '';
public $mobility = '';
public $occlusion = '';
public $other_findings = '';
public $recommendation = '';
public $review_of_systems;

 public $patientType; 
 public $pmh;

 public $medicines = [];
public array $selectedMedicines = []; // This will hold the selected IDs

public $selectedMedicineId;
    public $cart = [];

    public function mount(Queue $queue)
    {
     $this->selectedTreatments = [];
    $this->totalAmount = 0;

    // Load queue with patient
    $this->selectedQueue = $queue::with('patient')->find($queue->id);

    // Get the patient type from the queue
    $this->patientType = $this->selectedQueue->patient->type ?? 'standard';

    // Filter treatments based on patient type
    $this->treatments = TreatmentMaster::all()->map(function ($treatment) {
        // Add price according to patient type
        if ($this->patientType === 'fast_track') {
            $treatment->display_price = $treatment->fast_track_price;
            $treatment->price_type = 'fast_track_price';
        } else {
            $treatment->display_price = $treatment->price; // standard price
            $treatment->price_type = 'price';
        }
        return $treatment;
    });
// dd($this->selectedQueue);
    // Get the patient type from the queue
    $this->patientType = $this->selectedQueue->patient->type ?? 'standard';
// dd($patientType);
    // Filter medicines based on patient type
// $type = $this->patientType;

$this->medicines = Medicine::all()->map(function ($medicine) {
    $medicine->price = $medicine->sell_price;
    return $medicine;

    
});

// dd($this->medicines);

    }

    

public function addToCart()
{
    $medicine = Medicine::find($this->selectedMedicineId);

    if (!$medicine) return;

    // Use sell_price directly
    $price = $medicine->sell_price;

    // dd($price);

    $existingIndex = null;
    foreach ($this->cart as $index => $item) {
        if ($item['id'] === $medicine->id) {
            $existingIndex = $index;
            break;
        }
    }

    if ($existingIndex !== null) {
        $this->cart[$existingIndex]['quantity'] += 1;
    } else {
        $this->cart[] = [
            'id' => $medicine->id,
            'name' => $medicine->name,
            'sell_price' => $price,
            'quantity' => 1,
            'dosage' => '',
            'frequency' => '',
            'total_quantity' => $medicine->total_quantity,
        ];
    }

    $this->selectedMedicineId = null;
}

public function getCartWithSubtotalsProperty()
{
    return collect($this->cart)->map(function ($item) {
        $item['subtotal'] = $item['sell_price'] * ($item['quantity'] ?? 1);
        return $item;
    });
}



public function updatedCart()
{
    foreach ($this->cart as $index => $item) {
        // Ensure quantity is numeric and at least 1
        if (!is_numeric($item['quantity']) || $item['quantity'] < 1) {
            $this->cart[$index]['quantity'] = 1;
        }

        // Enforce max quantity not to exceed total_quantity
        if (isset($item['total_quantity']) && $item['quantity'] > $item['total_quantity']) {
            $this->cart[$index]['quantity'] = $item['total_quantity'];

            session()->flash('error', "Quantity for {$item['name']} cannot exceed available stock ({$item['total_quantity']}).");
        }
    }
}

    public function removeFromCart($index)
    {
        unset($this->cart[$index]);
        $this->cart = array_values($this->cart); // reindex
    }

  
public function updatedSelectedTreatments()
{
    $priceTypes = [];

    foreach ($this->selectedTreatments as $treatmentId => $selectedType) {
        $priceTypes[] = $selectedType;
    }

    $uniqueTypes = array_unique($priceTypes);

    if (count($uniqueTypes) > 1) {
        // Reset selections and show error
        $this->reset('selectedTreatments');
        $this->dispatch('price-type-mix-error');
        return;
    }

    $this->price_type = $uniqueTypes[0] ?? null;
    $this->calculateTotal();
}


public function saveTreatment()
{
    $this->validate([
        'cart.*.quantity' => 'required|integer|min:1',
        'cart.*.dosage' => 'required|string|max:255',
        'cart.*.frequency' => 'required|string|max:255',
    ]);

    if (empty($this->cart)) {

        $this->dispatch('toastMagic',
            status: 'error',
            title: 'Error!',
            message: 'Cart is empty.'
        );
        return;
    }

    \DB::beginTransaction();

    try {
        $invoice = Invoice::create([
            'patient_id' => $this->selectedQueue->patient->id,
            'queue_id' => $this->selectedQueue->id,
            'total_amount' => 0,
            'price_type' => 'medicine',
            'status' => 'unpaid',
            'type' => $this->patientType,
            'created_by' => auth()->id(),
        ]);

        $totalAmount = 0;

        foreach ($this->cart as $item) {
            $subtotal = $item['sell_price'] * $item['quantity'];

            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'medicine_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['sell_price'],
                'dosage' => $item['dosage'],
                'frequency' => $item['frequency'],
                'subtotal' => $subtotal,
            ]);

            $totalAmount += $subtotal;

            // Update medicine stock if necessary
            $medicine = Medicine::find($item['id']);
            if ($medicine) {
                $medicine->total_quantity = max($medicine->total_quantity - $item['quantity'], 0);
                $medicine->save();
            }
        }

        $invoice->update(['total_amount' => $totalAmount]);

        // Update queue status here:
        $this->selectedQueue->status = 'awaiting_payment';
        $this->selectedQueue->save();

        \DB::commit();

        $this->cart = [];

        $this->dispatch('toastMagic',
            status: 'success',
            title: 'Success!',
            message: 'Medicine invoice saved and queue status updated.'
        );

    } catch (\Exception $e) {
        \DB::rollBack();

        $this->dispatch('toastMagic',
            status: 'error',
            title: 'Error!',
            message: 'Failed to save invoice: ' . $e->getMessage()
        );

        
    }
}




public function calculateTotal()
{
    $this->total = 0;

    foreach ($this->selectedTreatments as $treatmentId => $selectedType) {
        $treatment = TreatmentMaster::find($treatmentId);
        if (!$treatment) continue;

        $this->total += $selectedType === 'fast_track_price' ? $treatment->fast_track_price : $treatment->price;
    }



}




 public function submitInvoice()
{
    $selected = $this->selectedTreatments;

    $priceTypes = collect($selected)->values()->unique();

    if ($priceTypes->count() > 1) {
        $this->dispatch('price-type-mix-error');
        return;
    }

   

   $invoice = Invoice::create([
    'patient_id' => $this->selectedQueue->patient->id,
    'queue_id' => $this->selectedQueue->id,
    'treatments' => $this->selectedTreatments,
    'total_amount' => $this->total,
    'type' => 'Investigation',
    'price_type' => $this->price_type,
    'created_by' => Auth::id(),
]);



    // ✅ Update queue status after creating invoice
    $this->selectedQueue->status = 'invoice_created';
    $this->selectedQueue->save();

          $this->dispatch('toastMagic',
            status: 'success',
            title: 'Success!',
            message: 'Invoice submitted and patient sent for diagnosis.'
        );

    return redirect()->route('diagnosis.patients');
}



    public $vitals = [
        'temperature' => null,
        'blood_pressure' => null,
        'heart_rate' => null,
     
    ];

    protected $rules = [
        'vitals.temperature' => 'required|numeric',
        'vitals.blood_pressure' => 'required|string|max:20',
        'vitals.heart_rate' => 'required|integer',
    'oral_hygiene' => 'required|string',
    'gum_condition' => 'required|string',
    'tooth_decay' => 'nullable|array',
    'missing_teeth' => 'nullable|string',
    'mobility' => 'nullable|string',
    'occlusion' => 'nullable|string',
    'other_findings' => 'nullable|string',
    'recommendation' => 'nullable|string',
    'appointment_date' => 'required|date|after_or_equal:today',
'appointment_notes' => 'nullable|string|max:1000',

        
      
    ];

    public function saveToothExamination()
{
    $this->validate([
        'oral_hygiene' => 'required|string',
        'gum_condition' => 'required|string',
        'tooth_decay' => 'nullable|array',
        'missing_teeth' => 'nullable|string',
        'mobility' => 'nullable|string',
        'occlusion' => 'nullable|string',
        'other_findings' => 'nullable|string',
        'recommendation' => 'nullable|string',
    ]);

    ToothExamination::create([
        'patient_id' => $this->selectedQueue->patient->id,
        'oral_hygiene' => $this->oral_hygiene,
        'gum_condition' => $this->gum_condition,
        'tooth_decay_present' => $this->tooth_decay, // saved as JSON
        'missing_teeth' => $this->missing_teeth,
        'mobility_of_teeth' => $this->mobility,
        'occlusion' => $this->occlusion,
        'other_findings' => $this->other_findings,
        'recommendation' => $this->recommendation,
    ]);

    $this->dispatch('toastMagic',
        status: 'success',
        title: 'Saved!',
        message: 'Tooth examination recorded successfully.'
    );

    $this->reset([
        'oral_hygiene',
        'gum_condition',
        'tooth_decay',
        'missing_teeth',
        'mobility',
        'occlusion',
        'other_findings',
        'recommendation',
    ]);
}

public function saveAppointment()
{
   $this->validate([
    'scheduled_at' => 'required|date|after_or_equal:today',
    'appointment_notes' => 'nullable|string|max:1000',
]);


   Appointment::create([
    'patient_id' => $this->selectedQueue->patient->id,
    'scheduled_at' => $this->scheduled_at,
    'notes' => $this->appointment_notes,
]);
    $this->dispatch('toastMagic',
        status: 'success',
        title: 'Success!',
        message: 'Appointment booked successfully.'
    );

   $this->reset(['scheduled_at', 'appointment_notes']);

}
public function save()
{
    $this->validate();

    VitalSign::create([
        'queue_id' => $this->selectedQueue->id, // ✅ use selectedQueue here
        'temperature' => $this->vitals['temperature'],
        'blood_pressure' => $this->vitals['blood_pressure'],
        'heart_rate' => $this->vitals['heart_rate'],
    ]);

    $this->dispatch('toastMagic',
        status: 'success',
        title: 'Success!',
        message: 'Vitals saved successfully.'
    );

    $this->reset('vitals');
}

public function saveChiefComplaint()
{
    $this->validate([
        'chiefComplaint' => 'required|string|max:1000',
    ]);

    ChiefComplaint::create([
        'patient_id' => $this->selectedQueue->patient->id,
        'complaint' => $this->chiefComplaint,
    ]);

    $this->dispatch('toastMagic',
        status: 'success',
        title: 'Success!',
        message: 'Chief complaint saved successfully.'
    );

    $this->reset('chiefComplaint');
}


public function savePMH()
    {
        $this->validate([
            'pmh' => 'required|string',
            'selectedQueue.id' => 'required|exists:queues,id',
        ]);

        PastMedicalHistory::create([
            'queue_id' => $this->selectedQueue->id,
            'description' => $this->pmh,
        ]);

        $this->dispatch('toastMagic',
            status: 'success',
            title: 'Success!',
            message: 'Past Medical History saved successfully.'
        );

        $this->pmh = ''; // reset the field
    }


public function saveHistory()
{
    $this->validate([
        'selectedQueue.id' => 'required|exists:queues,id',
        'historyOfIllness' => 'required|string',
    ]);

    HistoryOfIllness::create([
        'queue_id' => $this->selectedQueue->id,
        'description' => $this->historyOfIllness,
    ]);

    $this->dispatch('toastMagic',
        status: 'success',
        title: 'Success!',
        message: 'History saved successfully.'
    );

    $this->reset('historyOfIllness');
}



public function saveFamilySocialHistory()
{
    $this->validate([
        'selectedQueue.id' => 'required|exists:queues,id',
        'family_social_history' => 'required|string',
    ]);

    FamilySocialHistory::create([
        'queue_id' => $this->selectedQueue->id,
        'description' => $this->family_social_history,
    ]);

    $this->dispatch('toastMagic',
        status: 'success',
        title: 'Success!',
        message: 'Family/Social history saved successfully.'
    );

    $this->reset('family_social_history');
}


public function saveReviewOfSystems()
{
    $this->validate([
        'selectedQueue.id' => 'required|exists:queues,id',
        'review_of_systems' => 'required|string',
    ]);

    ReviewOfSystem::create([
        'queue_id' => $this->selectedQueue->id,
        'description' => $this->review_of_systems,
    ]);

    $this->dispatch('toastMagic',
        status: 'success',
        title: 'Success!',
        message: 'Review of Systems saved successfully.'
    );

    $this->reset('review_of_systems');
}





    
public function render()
{
    $appointments = Appointment::where('patient_id', $this->selectedQueue->patient->id)
        ->orderBy('scheduled_at', 'asc')
        ->get();

    return view('livewire.treatment.patient-dashboard', [
        'selectedQueue' => $this->selectedQueue,
        'treatments' => $this->treatments,
        'appointments' => $appointments,
    ]);
}

}