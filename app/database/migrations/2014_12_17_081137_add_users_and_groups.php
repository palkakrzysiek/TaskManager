<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersAndGroups extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('email');
			$table->string('name');
			$table->string('surname');
			$table->string('password');
			$table->string('remember_token');
			$table->integer('group_id')->nullable()->references('id')->on('groups');
			$table->integer('position_id')->nullable()	->references('id')->on('positions');
			$table->timestamps();

		});
		Schema::create('groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
		Schema::drop('groups');
	}

}
