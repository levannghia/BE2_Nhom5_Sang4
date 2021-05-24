<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productname',
        'producttype',
        'description',
        'price',
        'rating',
        'image',
        'catalogid',
    ];
    public function Product(){
        return $this->belongsTo('App\Catalog','catalogid');
    }
}
