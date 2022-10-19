<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherFieldsToInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('driver_name');
            $table->string('driver_phone');
            $table->double('total_amount');
            $table->string('pick_up');
            $table->string('drop_off');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('driver_name');
            $table->dropColumn('driver_phone');
            $table->dropColumn('total_amount');
            $table->dropColumn('pick_up');
            $table->dropColumn('drop_off');
        });
    }
}
