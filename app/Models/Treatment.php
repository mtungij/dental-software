<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = [
        'visit_id',
        'tooth',
        'procedure',
        'price',
        'fast_track_price',
        'is_fast_track',
        'remarks',
    ];

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }
}
