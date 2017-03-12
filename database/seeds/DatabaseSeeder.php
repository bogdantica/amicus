<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');


        $this->call('LuSubsidiaryTypeTableSeeder');
        $this->command->info('LuSubsidiaryType table seeded!');

        $this->call('LuEventTypeTableSeeder');
        $this->command->info('LuEventType table seeded!');

        $this->call('LuOptionTypeTableSeeder');
        $this->command->info('LuOptionType table seeded!');


		$this->call('SubsidiaryTableSeeder');
		$this->command->info('Subsidiary table seeded!');

		$this->call('EventTableSeeder');
		$this->command->info('Event table seeded!');


	}
}