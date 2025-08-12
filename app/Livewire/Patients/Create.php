<?php

namespace App\Livewire\Patients;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Patient;
use Livewire\Attributes\Layout;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Livewire\WithPagination;
use App\Models\ConsultationFeeSetting;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Queue;


#[Layout('components.layouts.app')]
class Create extends Component
{
    use WithPagination;

    // Personal Info
    public $name;
    public $dob;
    public $gender;
    public $marital_status;
    public $national_id;

    // Contact Info
    public $phone;
    public $email;
    public $address;
    public $emergency_name;
    public $emergency_phone;

    // Medical Info
    public $blood_group;
    public $allergies;
    public $medical_history;
    public $conditions;
    public $medications;
    public $insurance_provider;
    public $insurance_number;

    public $patients;
    public $selectpatientID = 0;
    public $patient_type; // add this
    public $showPaymentModal = false;
    public $consultation_fee = 0;
    public $patientData = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'dob' => 'nullable|date',
        'gender' => 'required|string',
        'marital_status' => 'nullable|string',
        'national_id' => 'nullable|string|max:50',
        'patient_type' => 'required|in:standard,fast_track',
        'email' => 'nullable|email|max:255',
        'address' => 'nullable|string|max:255',
        'emergency_name' => 'nullable|string|max:255',
        'emergency_phone' => 'nullable|string|max:20',
        'blood_group' => 'nullable|string|max:5',
        'allergies' => 'nullable|string',
        'medical_history' => 'nullable|string',
        'conditions' => 'nullable|string',
        'medications' => 'nullable|string',
        'insurance_provider' => 'nullable|string|max:255',
        'insurance_number' => 'nullable|string|max:100',
    ];

    // Recursively checks if strings are valid UTF-8; dumps first invalid occurrence
 
    // Clean a string by removing invalid UTF-8 bytes and control characters
    protected function cleanUtf8(?string $string): string
    {
        if (is_null($string)) return '';

        $clean = iconv('UTF-8', 'UTF-8//IGNORE', $string);
        $clean = preg_replace('/[\x00-\x1F\x7F-\x9F]/u', '', $clean);

        return $clean ?: '';
    }

  public function submit()
{
    $this->validate();

    $fees = ConsultationFeeSetting::first();

    if (!$fees) {
        $this->addError('consultation_fee', 'Consultation fees are not configured yet.');
        return;
    }

    $this->consultation_fee = $this->patient_type === 'fast_track'
        ? $fees->fast_track_fee
        : $fees->standard_fee;

    $year = date('Y');
    $month = date('m');
    $prefix = "VDC-{$year}/{$month}/";

    $lastPatient = Patient::where('patient_number', 'like', $prefix . '%')
        ->orderByRaw('CAST(SUBSTRING(patient_number, LENGTH(?) + 1) AS UNSIGNED) DESC', [$prefix])
        ->first();

    $nextSeq = $lastPatient ? intval(substr($lastPatient->patient_number, strlen($prefix))) + 1 : 1;
    $seqFormatted = str_pad($nextSeq, 4, '0', STR_PAD_LEFT);
    $patientNumber = $prefix . $seqFormatted;

    $this->patientData = [
        'name' => $this->name,
        'patient_number' => $patientNumber,
        'dob' => $this->dob,
        'gender' => $this->gender,
        'marital_status' => $this->marital_status,
        'national_id' => $this->national_id,
        'type' => $this->patient_type,
        'phone' => $this->phone,
        'email' => $this->email,
        'address' => $this->address,
        'emergency_name' => $this->emergency_name,
        'emergency_phone' => $this->emergency_phone,
        'blood_group' => $this->blood_group,
        'allergies' => $this->allergies,
        'medical_history' => $this->medical_history,
        'conditions' => $this->conditions,
        'medications' => $this->medications,
        'insurance_provider' => $this->insurance_provider,
        'insurance_number' => $this->insurance_number,
    ];

    $this->showPaymentModal = true;
}



public function confirmPayment()
{
    // Create patient record
    $patient = Patient::create($this->patientData);

    // Create invoice record
    $invoice = Invoice::create([
        'patient_id' => $patient->id,
        'type' => 'consultation_fee',
        'total_amount' => $this->consultation_fee,
        'price_type' => ucfirst($this->patientData['type']),
        'status' => 'paid',
        'created_by' => auth()->id(),
    ]);

    // Insert into queue table
    Queue::create([
        'patient_id' => $patient->id,
        'status' => 'diagnosing',
        'queue_date' => now()->toDateString(), // today's date
    ]);

    $this->dispatch('toastMagic',
        status: 'success',
        title: 'Success!',
        message: 'Patient paid consultation fee successfully and sent to Doctor.'
    );

    // Reset all public properties (clears form inputs)
    $this->reset();

    // Close the payment confirmation modal
    $this->showPaymentModal = false;
}


/**
 * Recursive UTF-8 checker helper that dumps and stops on first malformed string.
 */

/**
 * Recursive UTF-8 checker helper that dumps and stops on first malformed string.
 */


    public function cancelPayment()
    {
        $this->showPaymentModal = false;
    }

    public function changeDelete($memberid)
    {
        $this->selectpatientID = $memberid;
    }

    public function deleteUser()
    {
        if ($this->selectpatientID == 0) {
            return redirect()->back();
        }

        $user = Patient::findOrFail($this->selectpatientID);
        $user->delete();
        $this->selectpatientID = 0;

        $this->dispatch('toastMagic',
            status: 'success',
            title: 'Success!',
            message: 'Patient deleted successfully.'
        );
    }

    public function render()
    {
        return view('livewire.patients.create', [
            'patients' => Patient::latest()->paginate(10),
        ]);
    }
}
