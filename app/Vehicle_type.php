<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_type extends Model
{
    //
    public function vehicles()
    {
        return $this->hasMany('App\Vehicle','id');
    }
}
