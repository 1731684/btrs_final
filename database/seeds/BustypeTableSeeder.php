<?php

use Illuminate\Database\Seeder;

class BustypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bustypes')->insert([
            [ 'bustypes_title'=>'AC']
            
        ]);
    }
}
