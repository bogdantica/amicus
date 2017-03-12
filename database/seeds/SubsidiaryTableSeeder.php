<?php

use Illuminate\Database\Seeder;
use App\Models\Subsidiary;

class SubsidiaryTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('subsidiaries')->delete();

		// national
		Subsidiary::create(array(
				'name' => 'Amicus National',
				'address' => '',
				'country' => 'RO',
				'subsidiary_type_id' => 10,
				'active' => 1
			));

		// bucuresti
		Subsidiary::create(array(
				'name' => 'Amicus Bucuresti',
				'address' => '',
				'country' => 'RO',
				'city' => 'Bucuresti',
				'subsidiary_type_id' => 20,
				'active' => 1
			));
	}
}