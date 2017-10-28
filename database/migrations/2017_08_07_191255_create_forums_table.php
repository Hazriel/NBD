<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('description', 300)->nullable();
            $table->integer('last_post_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('topic_count')->unsigned()->default(0);
            $table->integer('post_count')->unsigned()->default(0);

            $table->integer('required_view_power')->unsigned();
            $table->integer('required_topic_create_power')->unsigned()->default(0);
            $table->integer('required_topic_update_power')->unsigned()->default(0);
            $table->integer('required_topic_delete_power')->unsigned()->default(0);

            $table->integer('required_post_create_power')->unsigned()->default(0);
            $table->integer('required_post_update_power')->unsigned()->default(0);
            $table->integer('required_post_delete_power')->unsigned()->default(0);

            $table->integer('display_order')->unsigned();

            $table->foreign('last_post_id')->references('id')->on('posts');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('forums');
    }
}
