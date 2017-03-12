<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('owner_id')->unsigned()->index();
			$table->text('content')->nullable();
			$table->string('title');
			$table->string('slug');
			$table->boolean('active')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}