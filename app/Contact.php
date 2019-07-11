<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $table = "contact";
    protected $fillable = [
        'name','phone','email','message','status'
    ];
}
