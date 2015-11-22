<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name')->default('unknown');
            $table->string('slug');
            $table->string('email');
            $table->text('intro')->nullable();
            $table->string('nationality')->default('unknown');
            $table->date('date_of_birth')->default('1980-01-01');
            $table->string('residence')->default('unknown');
            $table->string('athletic_skills')->default('unknown');
            $table->string('hero_status')->default('unknown');
            $table->text('hero_statement')->nullable();
            $table->text('biography')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
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
        Schema::drop('profiles');
    }
}
