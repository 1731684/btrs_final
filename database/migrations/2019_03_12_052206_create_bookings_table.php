<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{

    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('bookings_id');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('users_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('schedules_id')->unsigned();
            $table->foreign('schedules_id')->references('schedules_id')->on('schedules')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('buses_id')->unsigned();
            $table->foreign('buses_id')->references('buses_id')->on('buses')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('routes_id')->unsigned();
            $table->foreign('routes_id')->references('routes_id')->on('routes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('seat', '255')->nullable();
            $table->string('price')->nullable();
            $table->enum('profile', ['confirmed', 'cancelled', 'pending'])->default('pending');
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
        Schema::dropIfExists('bookings');
    }
}
