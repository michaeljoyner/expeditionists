<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDistancesAndDonationsToDateToExpedition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expeditions', function (Blueprint $table) {
            $table->integer('distance')->unsigned()->nullable();
            $table->integer('distance_to_date')->unsigned()->nullable();
            $table->string('donations_to_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expeditions', function (Blueprint $table) {
            $table->dropColumn(['distance', 'distance_to_date', 'donations_to_date']);
        });
    }
}
