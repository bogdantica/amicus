<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistrationFormsTable extends Migration {

	public function up()
	{
		Schema::create('registration_forms', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
			$table->boolean('active')->default(0);
			$table->integer('event_id')->unsigned()->index();
			$table->text('details')->nullable();
			$table->boolean('cost')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('registration_forms');
	}
}