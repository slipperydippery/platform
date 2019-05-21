<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompareScan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compare_scan', function (Blueprint $table) {
            $table->uuid('compare_id');
            $table->uuid('scan_id');

            $table->foreign('scan_id')->references('id')->on('scans');
            $table->foreign('compare_id')->references('id')->on('scans');

            $table->primary(array('scan_id', 'compare_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compare_scan');
    }
}
