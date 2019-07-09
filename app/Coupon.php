<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = "coupons";
    protected $fillable = [
        'code','type','value','startdate','enddate'
    ];

}
