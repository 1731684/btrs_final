<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whoweare extends Model
{
    protected $fillable=['title','image','description'];

    protected $table='whoweares';
}
