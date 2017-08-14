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
            $table->integer('last_comment_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('post_count')->unsigned()->default(0);
            $table->integer('comment_count')->unsigned()->default(0);

            $table->integer('required_view_post_power')->unsigned();
            $table->integer('required_create_post_power')->unsigned();
            $table->integer('required_modify_post_power')->unsigned();
            $table->integer('required_delete_post_power')->unsigned();

            $table->integer('required_create_comment_power')->unsigned();
            $table->integer('required_modify_comment_power')->unsigned();
            $table->integer('required_delete_comment_power')->unsigned();

            $table->integer('display_order')->unsigned();

            // Trouble with this line on mariadb
            //$table->foreign('last_comment_id')->references('id')->on('comments');
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
