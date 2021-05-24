<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'cart_id',	
        'transaction_id',	
        'product_id',	
        'quantity',	
        'total',	
        'user_id'
    ];
}
