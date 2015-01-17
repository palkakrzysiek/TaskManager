<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function($table) {
			$table->increments('id');
			$table->integer('group_id');
			$table->string('description');
			$table->dateTime('start_date');
			$table->dateTime('deadline');
			$table->string('feedback');
			$table->integer('difficulty');
			$table->integer('time_estimation'); // in hours
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}