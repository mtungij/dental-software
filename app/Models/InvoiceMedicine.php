<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceMedicine extends Model
{
        protected $fillable = [
        'invoice_id',
        'medicine_id',
        'quantity',
        'price',
        'total',
    ];

       public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
