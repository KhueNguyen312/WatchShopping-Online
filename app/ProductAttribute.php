<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    //
    protected $table = "product_attribute";
    protected $fillable = [
        'att_value_id','product_id'
    ];
    public function attribute_value() {
        return $this->belongsTo("App\AttributeValue","att_value_id","id");
    }
}
