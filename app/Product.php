<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true;

    protected $primaryKey = 'product_id';

    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
    
}
