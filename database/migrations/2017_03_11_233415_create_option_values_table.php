<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOptionValuesTable extends Migration {

	public function up()
	{
		Schema::create('option_values', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('option_id')->unsigned();
			$table->string('value');
			$table->integer('order')->nullable();
			$table->text('details')->nullable();
			$table->float('cost_value')->nullable();
			$table->integer('slots')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('option_values');
	}
}