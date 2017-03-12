<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('subsidiary_id')->references('id')->on('subsidiaries')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('subsidiaries', function(Blueprint $table) {
			$table->foreign('subsidiary_type_id')->references('subsidiary_type_id')->on('lookup_subsidiaries_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('events', function(Blueprint $table) {
			$table->foreign('event_type_id')->references('event_type_id')->on('lookup_event_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('events', function(Blueprint $table) {
			$table->foreign('subsidiary_id')->references('id')->on('subsidiaries')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('owner_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('registration_forms', function(Blueprint $table) {
			$table->foreign('event_id')->references('id')->on('events')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('registration_options', function(Blueprint $table) {
			$table->foreign('option_type_id')->references('option_type_id')->on('lookup_option_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('registration_options', function(Blueprint $table) {
			$table->foreign('form_id')->references('id')->on('registration_forms')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('option_values', function(Blueprint $table) {
			$table->foreign('option_id')->references('id')->on('registration_options')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('resource_entities', function(Blueprint $table) {
			$table->foreign('resource_id')->references('id')->on('resources')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('attendings', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('attendings', function(Blueprint $table) {
			$table->foreign('form_id')->references('id')->on('registration_forms')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('attendings', function(Blueprint $table) {
			$table->foreign('event_id')->references('id')->on('events')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('attend_options', function(Blueprint $table) {
			$table->foreign('attend_id')->references('id')->on('attendings')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('attend_options', function(Blueprint $table) {
			$table->foreign('option_id')->references('id')->on('registration_options')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_subsidiary_id_foreign');
		});
		Schema::table('subsidiaries', function(Blueprint $table) {
			$table->dropForeign('subsidiaries_subsidiary_type_id_foreign');
		});
		Schema::table('events', function(Blueprint $table) {
			$table->dropForeign('events_event_type_id_foreign');
		});
		Schema::table('events', function(Blueprint $table) {
			$table->dropForeign('events_subsidiary_id_foreign');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_owner_id_foreign');
		});
		Schema::table('registration_forms', function(Blueprint $table) {
			$table->dropForeign('registration_forms_event_id_foreign');
		});
		Schema::table('registration_options', function(Blueprint $table) {
			$table->dropForeign('registration_options_option_type_id_foreign');
		});
		Schema::table('registration_options', function(Blueprint $table) {
			$table->dropForeign('registration_options_form_id_foreign');
		});
		Schema::table('option_values', function(Blueprint $table) {
			$table->dropForeign('option_values_option_id_foreign');
		});
		Schema::table('resource_entities', function(Blueprint $table) {
			$table->dropForeign('resource_entities_resource_id_foreign');
		});
		Schema::table('attendings', function(Blueprint $table) {
			$table->dropForeign('attendings_user_id_foreign');
		});
		Schema::table('attendings', function(Blueprint $table) {
			$table->dropForeign('attendings_form_id_foreign');
		});
		Schema::table('attendings', function(Blueprint $table) {
			$table->dropForeign('attendings_event_id_foreign');
		});
		Schema::table('attend_options', function(Blueprint $table) {
			$table->dropForeign('attend_options_attend_id_foreign');
		});
		Schema::table('attend_options', function(Blueprint $table) {
			$table->dropForeign('attend_options_option_id_foreign');
		});
	}
}