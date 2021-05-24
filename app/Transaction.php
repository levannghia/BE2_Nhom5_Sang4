<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'transaction_id',
        'customer_name',	
        'total',	
        'quantity',	
        'address',	
        'telephone'
    ];
}
