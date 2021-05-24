<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'review_id',	
        'product_id',	
        'rating',	
        'comment',
        'user_id'	
    ];
}
