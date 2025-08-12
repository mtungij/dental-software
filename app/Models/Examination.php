<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    protected $fillable = [
        'patient_id',
        'tooth_data',
        'findings',
        'diagnosis',
        'treatment_plan'
    ];

    protected $casts = [
        'tooth_data' => 'array',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
