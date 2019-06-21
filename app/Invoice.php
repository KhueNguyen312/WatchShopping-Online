<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $table = "order";
    public function customer() {
        return $this->belongsTo("App\Customer","customer_id","id");
    }

}
