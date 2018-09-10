<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Medication;
class Purchase extends Model
{
    protected $table = 'purchase';

    public function supplier(){
        return $this->belongsTo('App\Supplier' ,'suppiler_id');
    }

}
