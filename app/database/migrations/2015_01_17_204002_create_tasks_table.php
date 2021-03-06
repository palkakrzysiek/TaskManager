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
		Schema::create('tasks', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->nullable()->references('id')->on('users');
			$table->string('description')->nullable();
			$table->dateTime('start_date')->nullable();
			$table->dateTime('deadline')->nullable();
			$table->string('feedback')->nullable();
			$table->integer('difficulty')->nullable();
			$table->integer('time_estimation')->nullable(); // in hours
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
		Schema::drop('tasks');
	}

}
