<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "product";
    protected $fillable = [
        'name','brand_id','price','discount','view',
        'img_link','img_list','stock','des','status'
    ];

    public function brand() {
        return $this->belongsTo("App\Brand","brand_id","id");
    }

}
