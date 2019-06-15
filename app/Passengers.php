<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passengers extends Model
{

    protected $table="passengers";
    protected $fillable=['name','age','gender','seat','buses_id','bookings_id','schedules_id','routes_id'];

}
