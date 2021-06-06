<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $primaryKey = 'order_detail_id';

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function Order() {
        return $this->belongsTo('App\Order', 'order_id');
    }
    public function Review() {
        return $this->hasOne('App\Review', 'order_detail_id', 'order_detail_id');
    }
}
