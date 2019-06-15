<?php

use Illuminate\Database\Seeder;

class RouteTableSeeder extends Seeder
{
    public function run()
    {


        DB::table('routes')->insert([
            [ 'routes_title'=>'Jaffna','destination'=>'Colombo'],
        ]);
    }
}
