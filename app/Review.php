<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'id', 'product_id', 'transaction_id', 'product_name','rating','comment','user_id'
    ];
    
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function Product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
