<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    public function vehicle_type()
    {
        return $this->belongsTo('App\Vehicle_type');
    }
}
