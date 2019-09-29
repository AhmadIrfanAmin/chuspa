<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App_image extends Model
{
    //
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
