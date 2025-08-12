<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
       protected $fillable = [
        'patient_id',
        'scheduled_at',
        'status',
        'notes',
    ];
protected $casts = [
    'scheduled_at' => 'datetime',
];

      public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
