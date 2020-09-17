<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public function bill()
    {
        return $this->belongsTo('App\Bill', 'bill_id', 'id');
    }
}
