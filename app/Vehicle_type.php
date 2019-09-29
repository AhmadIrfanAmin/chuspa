<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_type extends Model
{
    protected $fillable = [
        'type_name','image_url', 'price'
    ];
    public function vehicles()
    {
        return $this->hasMany('App\Vehicle','id');
    }
}
