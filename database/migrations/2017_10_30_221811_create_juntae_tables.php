<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuntaeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('is_finished')->default(false);
            $table->timestamps();
        });

        Schema::create('activity_card_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('color', 100);
            $table->timestamps();
        });

        Schema::create('activity_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id');
            $table->integer('activity_id');
            $table->integer('cart_status_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('activity_id')->references('id')->on('activities');
            $table->foreign('cart_status_id')->references('id')->on('activity_card_statuses');
        });

        Schema::create('activity_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activity_id');
            $table->integer('user_id');
            $table->timestamps();

            $table->foreign('activity_id')->references('id')->on('activities');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('activity_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activity_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('activity_id')->references('id')->on('activities');
        });

        Schema::create('activity_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activity_id');
            $table->integer('activity_user_id');
            $table->text('comment');
            $table->timestamps();

            $table->foreign('activity_id')->references('id')->on('activities');
            $table->foreign('activity_user_id')->references('id')->on('activity_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
        Schema::dropIfExists('activity_card_statuses');
        Schema::dropIfExists('activity_cards');
        Schema::dropIfExists('activity_users');
        Schema::dropIfExists('activity_files');
        Schema::dropIfExists('activity_comments');
    }
}
