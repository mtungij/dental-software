<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Queue extends Model
{
    protected $fillable = [
          'patient_id',
    'status',
  'queue_date',
    'updated_at'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

public function invoice()
{
    return $this->hasOne(Invoice::class);
}

    
    
}