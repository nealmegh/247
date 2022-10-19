<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVehicleInfoToDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drivers', function (Blueprint $table) {
            $table->string('private_hire_license')->nullable();
            $table->string('vehicle_make')->nullable();
            $table->string('vehicle_license')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drivers', function (Blueprint $table) {
            $table->dropColumn('private_hire_license');
            $table->dropColumn('vehicle_make');
            $table->dropColumn('vehicle_license');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
        });
    }
}
