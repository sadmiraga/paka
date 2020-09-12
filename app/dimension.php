<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dimension extends Model
{
    public function skupina()
    {
        return $this->belongsTo('App\skupina');
    }
}
