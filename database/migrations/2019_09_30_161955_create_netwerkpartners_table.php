<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetwerkpartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('netwerkpartners', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('active')->default(0);
            $table->integer('netwerkanalyse_id')->unsigned();
            $table->foreign('netwerkanalyse_id')->references('id')->on('netwerkanalyses')->onDelete('cascade');
            $table->integer('organisatie_id')->unsigned();
            $table->foreign('organisatie_id')->references('id')->on('organisaties')->onDelete('cascade');
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
        Schema::dropIfExists('netwerkpartners');
    }
}
