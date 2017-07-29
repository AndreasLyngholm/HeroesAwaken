<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserDiscordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_discords', function (Blueprint $table) {
            $table->integer('discord_discriminator')->unsigned()->nullable()->change();
            $table->string('discord_email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_discords', function (Blueprint $table) {
            //
        });
    }
}
