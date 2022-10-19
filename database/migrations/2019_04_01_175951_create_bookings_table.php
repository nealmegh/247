<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('driver_id')->nullable();
            $table->integer('location_id');
            $table->integer('airport_id');
            $table->integer('car_id');
            $table->string('from_to');
            $table->boolean('return');
            $table->dateTime('journey_date');
            $table->dateTime('return_date')->nullable();
            $table->string('pickup_address')->nullable();
            $table->string('dropoff_address')->nullable();
            $table->string('flight_number')->nullable();
            $table->boolean('meet');
            $table->integer('adult');
            $table->integer('child');
            $table->integer('luggage');
            $table->integer('carryon');
            $table->integer('price');
            $table->text('add_info')->nullable();
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
