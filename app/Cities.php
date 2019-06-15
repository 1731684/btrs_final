<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{



    protected $fillable=['cities_title','profile'];
    protected $table='cities';
    protected $primaryKey='cities_id';
}
