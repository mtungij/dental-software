<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationFeeSetting extends Model
{
        protected $fillable = ['standard_fee', 'fast_track_fee'];
}
