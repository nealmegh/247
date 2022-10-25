<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->string('trip_ref_id');
            $table->bigInteger('booking_ref_id');
            $table->string('journey_type');
            $table->bigInteger('driver_id');
            $table->decimal('collection_by_driver')->nullable();
            $table->decimal('collectable_by_driver');
            $table->boolean('trip_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
