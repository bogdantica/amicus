<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResourcesTable extends Migration {

	public function up()
	{
		Schema::create('resources', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->string('path');
			$table->string('extension')->nullable();
			$table->datetime('expire_date')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('resources');
	}
}