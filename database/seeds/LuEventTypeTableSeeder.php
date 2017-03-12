<?php

use Illuminate\Database\Seeder;
use App\Models\LuEventType;

class LuEventTypeTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('lookup_event_types')->delete();

		// event
		LuEventType::create(array(
				'event_type_id' => 10,
				'name' => 'event',
				'display' => 'Event',
				'description' => 'Eveniment'
			));

		// project
		LuEventType::create(array(
				'event_type_id' => 20,
				'name' => 'project',
				'display' => 'Project',
				'description' => 'Proiect'
			));
	}
}