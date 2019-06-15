<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{



    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('schedules_id');
            $table->integer('buses_id')->unsigned();
            $table->foreign('buses_id')->references('buses_id')->on('buses')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('routes_id')->unsigned();
            $table->foreign('routes_id')->references('routes_id')->on('routes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('departure_date',255)->nullable();
            $table->string('departure_time',255)->nullable();
            $table->string('arrival_date',255)->nullable();
            $table->string('arrival_time',255)->nullable();
            $table->longText('ticket_price')->nullable();
            $table->longText('boarding_points')->nullable();
            $table->longText('dropping_points')->nullable();
            $table->enum('shift',['day','night','none']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}

