<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{

    protected $fillable=['routes_title','destination'];
    protected $table='routes';
    protected $primaryKey='routes_id';

    public function buses(){
        return $this->hasMany('App\Schedules','routes_id');
    }

    public function schedules()
    {
    	return $this->hasMany('App\Schedules','routes_id');
    }
}
