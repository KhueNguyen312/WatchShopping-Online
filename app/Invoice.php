<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $table = "order";
    protected $fillable = [
        'receiver','customer_id','billing_address','email','phone','ship_cost','coupon_id','total'
    ];
    public function customer() {
        return $this->belongsTo("App\Customer","customer_id","id");
    }
    public function invoiceDetail() {
        return $this->hasMany('App\InvoiceDetail','order_id','id');
    }
    public function coupon() {
        return $this->belongsTo("App\Coupon","coupon_id","id");
    }

}
