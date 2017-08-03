<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateGameServerRegions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_server_regions', function (Blueprint $table) {
            $table->string('region', 2)->nullable()->change();
            $table->string('country', 2)->nullable()->change();
            $table->integer('weight')->nullable()->change();
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_server_regions', function (Blueprint $table) {
            //
        });
    }
}
