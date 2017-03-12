<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResourceEntitiesTable extends Migration {

	public function up()
	{
		Schema::create('resource_entities', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('resource_id')->unsigned()->index();
			$table->string('entity');
			$table->integer('entity_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('resource_entities');
	}
}