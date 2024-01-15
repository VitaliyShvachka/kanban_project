<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('board_id');
            $table->string('name');
            $table->text('description');
            $table->timestamps('');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('board_id')->references('id')->on('boards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('tasks', function (Blueprint $table){
        $table->dropForeign('tasks_status_id_foreign');
        $table->dropForeign('tasks_board_id_foreign');
      });
        Schema::dropIfExists('tasks');

    }
}
