<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLookupSubsidiariesTypesTable extends Migration {

	public function up()
	{
		Schema::create('lookup_subsidiaries_types', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('subsidiary_type_id')->unique();
			$table->string('name');
			$table->text('details')->nullable();
			$table->string('display');
		});
	}

	public function down()
	{
		Schema::drop('lookup_subsidiaries_types');
	}
}