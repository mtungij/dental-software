<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'name',
        'description',
          'buy_price',
         'sell_price',
         'stock_limit',
        'quantity_per_container',
        'total_quantity',
        'container',
    ];
}
