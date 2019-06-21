<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $table = "brand";
    protected $fillable = [
        'name','img_link','img_list','des'
    ];
}
