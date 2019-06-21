<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    //
    protected $table = "attribute_value";
    protected $fillable = [
        'att_id','value'
    ];


    public function attribute() {
        return $this->belongsTo("App\Attribute","att_id","id");
    }

}
