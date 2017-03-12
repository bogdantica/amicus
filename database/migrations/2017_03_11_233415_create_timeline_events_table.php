<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTimelineEventsTable extends Migration {

	public function up()
	{
		Schema::create('timeline_events', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->text('body')->nullable();
			$table->integer('entity_id')->unsigned()->nullable()->index();
			$table->string('entity_name')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('timeline_events');
	}
}