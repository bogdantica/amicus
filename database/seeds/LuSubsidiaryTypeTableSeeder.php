<?php

use Illuminate\Database\Seeder;
use App\Models\LuSubsidiaryType;

class LuSubsidiaryTypeTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('lookup_subsidiaries_types')->delete();

		// national
		LuSubsidiaryType::create(array(
				'subsidiary_type_id' => 10,
				'name' => 'national',
				'display' => 'Nationala'
			));

		// regional
		LuSubsidiaryType::create(array(
				'subsidiary_type_id' => 20,
				'name' => 'regional',
				'display' => 'Regional'
			));
	}
}