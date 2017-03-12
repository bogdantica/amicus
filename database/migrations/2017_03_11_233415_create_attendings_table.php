<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttendingsTable extends Migration {

	public function up()
	{
		Schema::create('attendings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->unsigned()->index();
			$table->integer('form_id')->unsigned()->index();
			$table->integer('event_id')->unsigned()->nullable()->index();
			$table->float('total_cost')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('attendings');
	}
}