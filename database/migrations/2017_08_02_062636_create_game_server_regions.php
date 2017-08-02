<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameServerRegions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_server_regions', function (Blueprint $table) {
            $table->string('game_ip', 15);
            $table->string('region', 2);
            $table->string('country', 2);
            $table->integer('weight');

            $table->primary('game_ip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_server_regions');
    }
}
