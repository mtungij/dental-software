<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TreatmentMaster extends Model
{
     protected $fillable = [
        'name',
        'price',
        'fast_track_price',
        'description',
    ];
}
