<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class okraski extends Model
{
    public function order()
    {
        return $this->belongsTo('App\order');
    }
}
