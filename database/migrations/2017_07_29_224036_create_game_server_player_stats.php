<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameServerPlayerStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_server_player_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gid')->unsigned();
            $table->integer('pid')->unsigned();
            $table->string('statsKey');
            $table->string('statsValue');

            $table->timestamps();

            $table->foreign('gid')->references('gid')->on('game_server_stats');
            $table->foreign('pid')->references('id')->on('game_heroes');
            $table->unique(['gid', 'pid', 'statsKey']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_server_player_stats');
    }
}
