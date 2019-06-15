<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
     protected $fillable=['answer','question'];
     protected $table='f_a_qs';

}
