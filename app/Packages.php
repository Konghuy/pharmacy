<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    protected $table = "package";

    protected $fillable = ['name','description'];
}
