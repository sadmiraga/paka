<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oblika extends Model
{
    public function order()
    {
        return $this->belongsTo('App\order');
    }

    public function skupina()
    {
        return $this->belongsTo('App\skupina');
    }
}
