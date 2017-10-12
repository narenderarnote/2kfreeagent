<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddplayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addplayers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('player_gametag');
            $table->string('name');
            $table->string('position');
            $table->string('platform');
            $table->string('timezone');
            $table->string('primary_skills');
            $table->string('secondary_skills');
            $table->integer('current_rating');
            $table->string('description');
            $table->integer('bronze_badge');
            $table->integer('silver_badge');
            $table->integer('gold_badge');
            $table->integer('fame_badge');
            $table->string('file_uploads');
            $table->string('mic');
            $table->string('game_mode');
            $table->string('youtube_link');
            $table->string('avaliable_time');
            $table->string('online_status');
            $table->string('player_adder_id');
            $table->string('gametag');
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
        Schema::dropIfExists('addplayers');
    }
}
