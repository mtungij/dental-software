<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToothExamination extends Model
{
    protected $fillable = [
        'oral_hygiene',
        'gum_condition',
        'tooth_decay_present',     // Can be stored as JSON
        'missing_teeth',
        'mobility_of_teeth',
        'occlusion',
        'other_findings',
        'recommendation',
        'patient_id',              // Assuming it's linked to a patient
    ];

    protected $casts = [
        'tooth_decay_present' => 'array', // Store selected teeth with decay
    ];

    // Relationships (optional, if you have a Patient model)
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
