<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookingsinfo', function (Blueprint $table) {
            $table->increments('bookingsinfo_id');
            $table->string('name','255')->nullable();
            $table->string('contact','100')->nullable();
            $table->string('address','255')->nullable();
            $table->integer('buses_id')->unsigned();
            $table->foreign('buses_id')->references('buses_id')->on('buses')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('routes_id')->unsigned();
            $table->foreign('routes_id')->references('routes_id')->on('routes')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('bookings_id')->unsigned();
            $table->foreign('bookings_id')->references('bookings_id')->on('bookings')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('schedules_id')->unsigned();
            $table->foreign('schedules_id')->references('schedules_id')->on('schedules')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('gender',['male','female','other'])->default('male');
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
        Schema::dropIfExists('bookingsinfo');
    }
}
