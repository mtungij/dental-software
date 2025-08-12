<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{

    protected $fillable = [
        'appointment_id',
        'doctor_id',
        'reason',
        'diagnosis',
        'notes',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function treatments()
    {
        return $this->hasMany(Treatment::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
