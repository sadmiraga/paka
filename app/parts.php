<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parts extends Model
{
    public function skupina()
    {
        return $this->belongsTo('App\skupina');
    }

    public function order()
    {
        return $this->belongsTo('App\order');
    }
}
