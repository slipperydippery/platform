<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedInteger('order');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->tinyInteger('finalized')->default(0);
            $table->tinyInteger('complete')->default(0);
            $table->tinyInteger('sharepermission')->default(1);
            $table->decimal('algemeenbeeld', 3, 1)->nullable();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('instantie_id')->unsigned();
            $table->foreign('instantie_id')->references('id')->on('instanties')->onDelete('cascade');
            $table->uuid('group_id')->nullable();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->integer('scanmodel_id')->unsigned()->default(1);
            $table->foreign('scanmodel_id')->references('id')->on('scanmodels')->onDelete('cascade');
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
        Schema::dropIfExists('scans');
    }
}
