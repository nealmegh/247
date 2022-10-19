<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('ref_id')->nullable();
            $table->double('extra_price')->nullable();
            $table->double('custom_price')->nullable();
            $table->integer('book_by')->default(1);
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
            $table->dropColumn('ref_id');
            $table->dropColumn('book_by');
            $table->dropColumn('extra_price');
            $table->dropColumn('custom_price');
        });
    }
}
