<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
       protected $fillable = [
        'invoice_id',
        'patient_id',
        'user_id',
        'amount',
        'paid_at',
        'reference',
        'method',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
