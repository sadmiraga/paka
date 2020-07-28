<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class preliv extends Model
{
    public function order()
    {
        return $this->belongsTo('App\order');
    }
}
