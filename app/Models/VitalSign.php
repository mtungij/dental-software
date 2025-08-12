<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    protected $fillable = [
        'queue_id',
        'temperature',
        'blood_pressure',
        'heart_rate',
        // Add other fields as necessary
    ];
}
