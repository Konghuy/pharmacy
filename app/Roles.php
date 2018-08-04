<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'role';
    
    protected $fillable = ['name','description'];
}
