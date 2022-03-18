<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
     protected $guarded= [];
     public function orders()
    {
        return $this->belongsTo(Order::class, 'id');
    }
    public function products()
    {
        return $this->belongsTo(Product::class, 'id');
    }
}
