<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    //
    protected $table = "order_detail";
    public function product() {
        return $this->belongsTo('App\Product','product_id','id');
    }
}
