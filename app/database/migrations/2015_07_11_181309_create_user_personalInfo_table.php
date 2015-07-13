<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserPersonalInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_personalInfo', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->integer('user_id');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('primary_email');
			$table->string('secondary_email');
			$table->integer('age');
			$table->string('gender');
			$table->string('avatar');			
			$table->string('lastLogin');

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
		Schema::drop('user_personalInfo');
	}

}
