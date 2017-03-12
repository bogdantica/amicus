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
			$table->integer('option_id')->unique()->unsigned();
			$table->string('value');
			$table->float('cost_value')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('option_values');
	}
}