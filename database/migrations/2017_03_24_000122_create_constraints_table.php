<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstraintsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('constraints', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('metric_id')->unsigned();
            $table->string('constraint_name');
            $table->timestamps();

            $table->foreign('metric_id')->references('id')->on('metrics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('constraints');
    }
}
