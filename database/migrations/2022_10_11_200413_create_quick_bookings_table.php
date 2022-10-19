<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quick_bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('location_id');
            $table->integer('airport_id');
            $table->integer('car_id');
            $table->string('from_to');
            $table->boolean('return');
            $table->dateTime('journey_date');
            $table->dateTime('return_date')->nullable();
            $table->string('pickup_time')->nullable();
            $table->string('return_time')->nullable();
            $table->string('pickup_address')->nullable();
            $table->string('dropoff_address')->nullable();
            $table->integer('price');
            $table->double('custom_price')->nullable();
            $table->double('final_price')->nullable();
            $table->integer('book_by')->default(1);
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
        Schema::dropIfExists('quick_bookings');
    }
};
