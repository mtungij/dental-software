<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilySocialHistory extends Model
{
     protected $fillable = [
        'queue_id',
        'description',
    ];

    // Optional: relationship to queue
    public function queue()
    {
        return $this->belongsTo(Queue::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
