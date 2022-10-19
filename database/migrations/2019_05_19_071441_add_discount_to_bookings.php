<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDiscountToBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->boolean('discount_type')->default(0);
            $table->double('discount_value')->default(0);
            $table->double('discount_amount')->default(0);
            $table->double('final_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('discount_type');
            $table->dropColumn('discount_value');
            $table->dropColumn('discount_amount');
            $table->dropColumn('final_price');
        });
    }
}
