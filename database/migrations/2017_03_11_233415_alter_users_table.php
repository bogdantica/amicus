<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterUsersTable extends Migration {

	public function up()
	{
		Schema::table('users', function(Blueprint $table) {

			$table->softDeletes();
            $table->dropColumn('name');
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->date('birthday')->nullable();
			$table->string('phone')->nullable();
			$table->string('country')->nullable();
			$table->string('county')->nullable();
			$table->string('city')->nullable();
			$table->text('skills')->nullable();
			$table->text('about')->nullable();
			$table->integer('subsidiary_id')->unsigned()->index()->nullable();
			$table->boolean('active')->default(0);
			$table->string('sex')->nullable();
		});
	}

	public function down()
	{
		//Schema::drop('users');
	}
}