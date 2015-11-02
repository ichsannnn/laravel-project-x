<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('username')->unique();
			$table->string('foto');
			$table->string('header');
			$table->string('bornplace');
			$table->string('borndate');
			$table->string('gender');
			$table->string('phone');
			$table->text('notes');
			$table->text('address');
			$table->string('relationship');
			$table->string('role');
			$table->string('workplace');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('activated',1);
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
