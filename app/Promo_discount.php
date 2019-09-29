<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo_discount extends Model
{
    protected $fillable = [
        'promo_code','discount_percentage', 'created_by','status','consume_count','fk_user_type',
    ];
}
