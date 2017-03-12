<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	public function up()
	{
		Schema::create('events', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->datetime('start_date');
			$table->datetime('end_date');
			$table->text('address');
			$table->string('country')->nullable();
			$table->string('county')->nullable();
			$table->string('city')->nullable();
			$table->text('description')->nullable();
			$table->integer('event_type_id')->unsigned()->index();
			$table->boolean('active')->default(0);
			$table->integer('subsidiary_id')->unsigned()->nullable()->index();
		});
	}

	public function down()
	{
		Schema::drop('events');
	}
}