<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $table = "product_master";

    public function category(){
        return $this->belongsTo('App\Categories', 'cat_id');
    }

    public function ranking(){
        return $this->belongsTo('App\Rank', 'rank_number_id');
    }

    public function stock(){
        return $this->hasOne('App\Stock','id');
    }

    public function package(){
        return $this->belongsTo('App\Packages', 'package_id');
    }

    public function purchaseItem(){
        return $this->hasMany('App\PurchaseItem', 'product_id');
    }
}
