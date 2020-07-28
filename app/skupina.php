<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skupina extends Model
{
    public function order()
    {
        return $this->belongsTo('App\order');
    }

    public function oblika()
    {
        return $this->hasMany('App\oblika');
    }

    public function okus()
    {
        return $this->hasMany('App\okus');
    }

    public function parts()
    {
        return $this->hasMany('App\parts');
    }
}
