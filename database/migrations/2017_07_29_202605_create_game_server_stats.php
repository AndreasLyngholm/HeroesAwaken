<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameServerStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_server_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gid')->unsigned();
            $table->string('statsKey');
            $table->string('statsValue');

            $table->timestamps();

            $table->unique(['gid', 'statsKey']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_server_stats');
    }
}
