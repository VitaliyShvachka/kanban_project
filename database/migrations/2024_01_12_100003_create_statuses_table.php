<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('statuses', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
      });
        DB::table('statuses')->insert([
            'name' => 'to do'
        ]);
        DB::table('statuses')->insert([
            'name' => 'in progress'
        ]);
        DB::table('statuses')->insert([
            'name' => 'done'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('statuses');
    }
}
