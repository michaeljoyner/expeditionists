<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpeditionTeamMemberPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedition_team_member', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expedition_id')->unsigned();
            $table->integer('team_member_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('expedition_team_member');
    }
}
