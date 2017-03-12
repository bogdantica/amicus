<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLookupEventTypesTable extends Migration {

	public function up()
	{
		Schema::create('lookup_event_types', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('event_type_id')->unique()->unsigned();
			$table->string('name');
			$table->string('display');
			$table->string('description')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('lookup_event_types');
	}
}