<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DistrictScan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_scan', function (Blueprint $table) {
            $table->integer('district_id')->unsigned();
            $table->string('scan_id');

            $table->foreign('scan_id')->references('id')->on('scans');
            $table->foreign('district_id')->references('id')->on('districts');

            $table->primary(array('scan_id', 'district_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('district_scan');
    }
}
