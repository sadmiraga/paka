<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function skupina()
    {
        return $this->hasMany('App\skupina');
    }

    public function oblika()
    {
        return $this->hasMany('App\oblika');
    }

    public function okus()
    {
        return $this->hasMany('App\okus');
    }

    public function preliv()
    {
        return $this->hasMany('App\preliv');
    }

    public function okraski()
    {
        return $this->hasMany('App\okraski');
    }

    public function parts()
    {
        return $this->hasMany('App\parts');
    }
}
