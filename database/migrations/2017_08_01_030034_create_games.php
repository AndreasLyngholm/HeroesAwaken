<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->integer('gid')->unsigned();
            $table->string('shard', 6);

            $table->string('game_ip', 15);
            $table->integer('game_port');
            $table->string('game_version', 32);

            $table->string('status_join', 1);
            $table->string('status_mapname', 16);

            $table->integer('players_connected');
            $table->integer('players_joining');
            $table->integer('players_max');

            $table->integer('team_1');
            $table->integer('team_2');
            $table->string('team_distribution', 32);

            $table->timestamps();

            $table->primary(['gid', 'shard']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
