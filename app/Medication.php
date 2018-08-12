<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $table = "product_master";
    // protected $dates = ['manuDate','expireDate'];

    public function category(){
        return $this->belongsTo('App\Categories');
    }

}
