<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashmessages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('message');
            $table->string('type')->nullable();
            $table->integer('dashmessagable_id')->unsigned();
            $table->string('dashmessagable_type');
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
        Schema::dropIfExists('dashmessages');
    }
}
