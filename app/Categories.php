<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = "category";
    
    public function medication(){
        return ($this->hasMany('App\Medication'));
    }
}
