<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    public function bill()
    {
        return $this->belongsTo('App\Bill');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
