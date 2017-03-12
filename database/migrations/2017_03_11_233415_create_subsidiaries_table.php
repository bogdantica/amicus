<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubsidiariesTable extends Migration {

	public function up()
	{
		Schema::create('subsidiaries', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->text('address')->nullable();
			$table->string('country')->nullable();
			$table->string('county')->nullable();
			$table->string('city')->nullable();
			$table->integer('subsidiary_type_id')->unsigned();
			$table->boolean('active')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('subsidiaries');
	}
}