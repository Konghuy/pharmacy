<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = "stock";
    public $timestamps = false;

    public function medication(){
        return $this->belongsTo('App\Medication','pro_id');
    }

}
