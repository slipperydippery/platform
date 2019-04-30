<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComparisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comparisons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('scan_id')->unsigned();
            $table->foreign('scan_id')->references('id')->on('scans')->onDelete('cascade');
            $table->integer('scanmodel_id')->unsigned()->nullable();
            $table->foreign('scanmodel_id')->references('id')->on('scanmodels')->onDelete('cascade');
            $table->integer('instantie_id')->unsigned()->nullable();
            $table->foreign('instantie_id')->references('id')->on('intanties')->onDelete('cascade');
            // Create a pivot table with districts? 
            // Create a pivot table with scans
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
        Schema::dropIfExists('comparisons');
    }
}
