<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expedition_id')->unsigned();
            $table->foreign('expedition_id')->references('id')->on('expeditions')->onDelete('cascade');
            $table->float('longitude',10,6);
            $table->float('latitude',10,6);
            $table->string('title');
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
        Schema::drop('map_locations');
    }
}
