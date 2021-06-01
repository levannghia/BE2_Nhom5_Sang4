<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $primaryKey = 'order_detail_id';

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
