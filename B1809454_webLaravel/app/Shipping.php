<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $guarded = [];
    public function shippingGetCustomers()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

}
