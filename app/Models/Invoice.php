<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Invoice extends Model
{
    protected $fillable = [
    'patient_id',
    'queue_id',
    'treatments',
    'type',
     'status',
    'price_type',
    'total_amount',
    'created_by',
    ];

    protected $casts = [
        'treatments' => 'array',
    ];
 public function patient()
    {
        return $this->belongsTo(Patient::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }



public function createdByUser()
{
    return $this->belongsTo(User::class, 'created_by');
}


public function medicines()
{
    return $this->hasMany(InvoiceMedicine::class);
}

public function invoiceItems()
{
    return $this->hasMany(InvoiceItem::class);
}

public function queue()
{
    return $this->belongsTo(Queue::class);
}




    

  
}
