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
        Schema::table('drivers', function (Blueprint $table) {
            $table->string('dlva_eccc')->nullable();
            $table->string('driving_license')->nullable();
            $table->date('driving_license_date')->nullable();
            $table->string('driving_license_image')->nullable();
            $table->string('bank_statement_image')->nullable();
            $table->date('private_hire_license_date')->nullable();
            $table->string('private_hire_license_image')->nullable();
            $table->date('private_hire_vehicle_license_date')->nullable();
            $table->string('private_hire_vehicle_license_image')->nullable();
            $table->string('logbook_image')->nullable();
            $table->string('insurance_image')->nullable();
            $table->date('insurance_date')->nullable();
            $table->string('coc_image')->nullable();


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
            $table->dropColumn('dlva_eccc');
            $table->dropColumn('coc_image');
            $table->dropColumn('insurance_date');
            $table->dropColumn('insurance_image');
            $table->dropColumn('logbook_image');
            $table->dropColumn('private_hire_vehicle_license_image');
            $table->dropColumn('private_hire_vehicle_license_date');
            $table->dropColumn('private_hire_license_image');
            $table->dropColumn('private_hire_license_date');
            $table->dropColumn('bank_statement_image');
            $table->dropColumn('driving_license_image');
            $table->dropColumn('driving_license_date');
            $table->dropColumn('driving_license');
        });
    }
};
