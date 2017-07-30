<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateGameServerPlayerStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_server_player_stats', function (Blueprint $table) {
            $table->dropForeign('game_server_player_stats_gid_foreign');
            $table->dropForeign('game_server_player_stats_pid_foreign');
            $table->foreign('gid')->references('gid')->on('game_server_stats')->onDelete('cascade');
            $table->foreign('pid')->references('id')->on('game_heroes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_server_player_stats', function (Blueprint $table) {
            //
        });
    }
}
