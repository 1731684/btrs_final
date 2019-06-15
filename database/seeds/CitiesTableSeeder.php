<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('cities')->insert([
            [ 'cities_title'=>'Jaffna','profile'=>'verified'],
            [ 'cities_title'=>'Colombo','profile'=>'verified']
            
        ]);
    }
}
