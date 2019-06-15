<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bustypes extends Model
{

    protected $fillable=['bustypes_title','seat','image'];
    protected $guarded=['bustypes_id'];
    protected $table='bustypes';
    protected $primaryKey='bustypes_id';

    public function buses(){
        return $this->hasMany('App\Buses','bustypes_id');
    }
}
