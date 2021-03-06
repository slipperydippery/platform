<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('question');
            $table->text('successfactor');
            $table->text('riskfactor');
            $table->text('justification');
            $table->text('bodytooltip')->nullable();
            $table->boolean('nvt')->nullable()->default(false);
            $table->integer('theme_id')->unsigned();
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
            $table->tinyInteger('order')->unsigned();
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
        Schema::dropIfExists('questions');
    }
}
