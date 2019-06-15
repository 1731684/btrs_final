<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{

    protected $fillable=['buses_id','arrival_time','arrival_date','departure_date','departure_time','shift','ticket_price','boarding_points','dropping_points','routes_id'];
    protected $table='schedules';
    protected $primaryKey='schedules_id';

    public function buses(){
        return $this->belongsTo('App\Buses','buses_id');
    }
     public function routes()
    {
    	return $this->belongsTo('App\Routes','routes_id');
    }



}
