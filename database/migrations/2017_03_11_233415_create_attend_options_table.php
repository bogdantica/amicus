<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttendOptionsTable extends Migration {

	public function up()
	{
		Schema::create('attend_options', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('attend_id')->unsigned()->index();
			$table->integer('option_id')->unsigned()->index();
			$table->float('cost_value')->nullable();
			$table->string('value');
		});
	}

	public function down()
	{
		Schema::drop('attend_options');
	}
}