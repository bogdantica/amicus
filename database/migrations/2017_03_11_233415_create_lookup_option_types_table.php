<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLookupOptionTypesTable extends Migration {

	public function up()
	{
		Schema::create('lookup_option_types', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('option_type_id')->unique()->unsigned();
			$table->string('name');
			$table->string('display');
			$table->string('details')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('lookup_option_types');
	}
}