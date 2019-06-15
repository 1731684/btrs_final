<?php

use Illuminate\Database\Seeder;

class BusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buses')->insert([
            [ 'buses_title'=>'Sri Murukan','vendors_id'=>1,'vehicle_no'=>'1212','billbook_no'=>121221,'bustypes_id'=>1]
            
        ]);
    }
}
