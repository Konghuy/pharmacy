<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = "category";

    protected $fillable = ['name','description'];
}
