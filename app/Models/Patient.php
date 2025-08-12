<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
    // Personal Info
    'name',
    'patient_number',
    'dob',
    'gender',
    'marital_status',
    'national_id',

    // Contact Info
    'phone',
    'email',
    'address',
    'emergency_name',
    'emergency_phone',
      'type', // 'standard' or 'fast_track'
    // Medical Info
    'medical_history',
    'allergies',
    'blood_group',
    'insurance_provider',
    'insurance_number',
    'conditions',
    'medications',
];


    
     public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }


    public function treatmentNotes()
{
    return $this->hasMany(TreatmentNote::class);
}

public function familySocialHistories()
{
    return $this->hasMany(FamilySocialHistory::class);
}

public function reviewOfSystems()
{
    return $this->hasMany(ReviewOfSystem::class);
}

public function pastMedicalHistories()
{
    return $this->hasMany(PastMedicalHistory::class);
}

//     public function visits()
//     {
//         return $this->hasMany(Visit::class);
//     }
// }

public function treatmentmaster()
{
    return $this->hasMany(TreatmentMaster::class, 'patient_id', 'id');
}


}