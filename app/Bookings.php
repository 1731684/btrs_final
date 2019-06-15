<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{


    protected $fillable=['buses_id','users_id','schedules_id','routes_id','seat','price','profile'];
    /*protected $casts    = [
        'seat'           =>  'array',
    ];*/
    protected $primaryKey='bookings_id';


    public function buses()
    {
        return $this->belongsTo('App\Buses','buses_id');
    }

    public function routes()
    {
        return $this->belongsTo('App\Routes','routes_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Users','users_id');
    }

    public function schedules()
    {
        return $this->belongsTo('App\Schedules','schedules_id');
    }
}
