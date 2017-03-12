<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('users')->delete();

        $adminRole = \App\Role::create([
            'name' => 'admin',
            'display_name' => 'Admin'
        ]);

		// admin
		$admin = User::create(array(
				'first_name' => 'admin',
				'last_name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin123'),
				'active' => 1
			));

		$admin->attachRole($adminRole);
	}
}