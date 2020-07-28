<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class okus extends Model
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
