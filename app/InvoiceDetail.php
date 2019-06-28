<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    //
    protected $table = "order_detail";
    protected $fillable = [
        'product_id','detail_price','qty'
    ];
    public function product() {
        return $this->belongsTo('App\Product','product_id','id');
    }
    public function invoice() {
        return $this->belongsTo('App\Invoice','order_id','id');
    }
}
