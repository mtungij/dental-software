<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryOfIllness extends Model
{
   protected $fillable = ['queue_id', 'description'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
