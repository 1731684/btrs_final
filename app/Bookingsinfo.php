<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookingsinfo extends Model
{

    protected $fillable=['name','contact','address','gender','bookings_id','routes_id','schedules_id','buses_id'];
    protected $table='bookingsinfo';
    protected $primaryKey='bookingsinfo_id';

}
