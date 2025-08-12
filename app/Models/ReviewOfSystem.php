<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewOfSystem extends Model
{
    protected $table = 'review_of_systems'; // since plural is irregular
    protected $fillable = ['queue_id', 'description'];

    public function queue()
    {
        return $this->belongsTo(Queue::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}

