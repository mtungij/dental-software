<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ChiefComplaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'complaint',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}