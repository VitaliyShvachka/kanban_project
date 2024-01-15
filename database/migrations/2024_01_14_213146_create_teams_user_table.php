<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('user_id');
          $table->foreign('team_id')->references('id')->on('teams');
          $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('teams_user', function (Blueprint $table){
        $table->dropForeign('users_task_team_id_foreign');
        $table->dropForeign('users_task_user_id_foreign');
      });
        Schema::dropIfExists('teams_user');
    }
}
