<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('facebook_id')->unique();
            $table->string('page_token');
            $table->integer('user_id');
            $table->string('name');
            $table->string('avatar');
            $table->string('hometown');
            $table->string('about');
            $table->string('bio');
            $table->string('band_members');
            $table->string('artists_we_like');
            $table->string('booking_agent');
            $table->string('website');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages');
    }
}
