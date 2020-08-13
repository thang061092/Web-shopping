<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function details()
    {
        return $this->hasMany('App\Detail');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
