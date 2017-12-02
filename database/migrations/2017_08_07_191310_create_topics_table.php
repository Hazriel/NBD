<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->integer('owner_id')->unsigned();
            $table->integer('last_post_id')->unsigned()->nullable();
            $table->integer('post_count')->unsigned()->default(0);
            $table->integer('forum_id')->unsigned();

            $table->foreign('owner_id')->references('id')->on('users');

            // Trouble with this line on mariadb
            $table->foreign('forum_id')->references('id')->on('forums');

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
        Schema::dropIfExists('topics');
    }
}
