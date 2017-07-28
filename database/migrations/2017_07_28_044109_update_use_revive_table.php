<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUseReviveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_revive', function (Blueprint $table) {
            $table->string('revive_name')->nullable();
            $table->string('revive_email')->nullable();
            $table->string('revive_role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_revive', function (Blueprint $table) {
            //
        });
    }
}
