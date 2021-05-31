<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function Product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
