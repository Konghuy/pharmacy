<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';

    public function purchase(){
        return $this->belongsTo('App\Purchase');
    }
}
