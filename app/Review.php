<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $primaryKey = 'order_detail_id';
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
    public function OrderDetail() {
        return $this->belongsTo('App\OrderDetail', 'order_detail_id', 'order_detail_id');
    }
    
}
