<?php

use Illuminate\Database\Seeder;
use App\Models\LuOptionType;

class LuOptionTypeTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('lookup_option_types')->delete();

		// text
		LuOptionType::create(array(
				'option_type_id' => 10,
				'name' => 'text',
				'display' => 'Text',
				'details' => 'Just text. For comments or requirements.'
			));

		// enumeration
		LuOptionType::create(array(
				'option_type_id' => 20,
				'name' => 'enumeration',
				'display' => 'Enumeration',
				'details' => 'Can select one option from options list.'
			));

		// multiple
		LuOptionType::create(array(
				'option_type_id' => 30,
				'name' => 'multiple',
				'display' => 'Multiple',
				'details' => 'Can chose multiple options from options list.'
			));
	}
}