<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whatweoffer extends Model
{
    protected $fillable=['title','image','description'];

    protected $table='whatweoffers';
}
