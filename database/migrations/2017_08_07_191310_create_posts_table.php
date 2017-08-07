<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->text('content');
            $table->integer('owner_id')->unsigned();
            $table->integer('last_comment_id')->unsigned();
            $table->integer('comment_count')->unsigned()->default(0);
            $table->integer('forum_id')->unsigned();
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('last_comment_id')->references('id')->on('comments');
            $table->foreign('forum_id')->references('id')->on('forum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
