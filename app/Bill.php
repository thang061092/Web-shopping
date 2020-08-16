<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function details()
    {
        return $this->hasMany('App\Detail');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'details', 'bill_id', 'product_id');
    }
}
