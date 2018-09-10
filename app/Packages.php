<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    protected $table = "package";

    public function medicine(){
        return $this->hasMany('App\Medication');
    }
    
}
