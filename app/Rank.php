<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = 'rank_number';

    public function medication(){
        return ($this->hasMany('App\Medication'));
    }
}
