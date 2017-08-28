<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->unique();
            $table->string('slug', 30)->unique();
            $table->text('description')->nullable();

            // Permission powers
            $table->integer('category_view_power')->unsigned()->default(0);
            $table->integer('forum_view_power')->unsigned()->default(0);

            $table->integer('post_create_power')->unsigned()->default(0);
            $table->integer('post_update_power')->unsigned()->default(0);
            $table->integer('post_delete_power')->unsigned()->default(0);

            $table->integer('comment_create_power')->unsigned()->default(0);
            $table->integer('comment_update_power')->unsigned()->default(0);
            $table->integer('comment_delete_power')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
