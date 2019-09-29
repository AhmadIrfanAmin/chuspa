<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User','id');
    }
    public function app_images()
    {
        return $this->hasMany('App\App_image','fk_order_id');
    }
}
