<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceItem extends Model
{
     protected $fillable = [
        'invoice_id',
        'medicine_id',
        'quantity',
        'price',
        'dosage',
        'frequency',
        'subtotal',
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

public function medicine(): BelongsTo
{
    return $this->belongsTo(Medicine::class);
}

}
