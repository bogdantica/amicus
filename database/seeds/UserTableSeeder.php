<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    public function run()
    {

        $routes = \Illuminate\Support\Facades\Route::getRoutes();

        $permissions = [];

        foreach ($routes as $route) {
            $middleware = collect($route->gatherMiddleware());

            $values = explode(':', collect($middleware->last())->last());
            if ($values[0] == 'permission') {
                if (!in_array($values[1], $permissions)) {
                    $permissions[] = $values[1];
                }

            }

        }

        $perms = [];

        foreach ($permissions as $permission) {
            $perm = \App\Permission::create([
                'name' => $permission,
                'display_name' => ucfirst(str_replace('-', ' ', $permission)),
            ]);

            $perms[] = $perm;
        }

        //DB::table('users')->delete();

        $adminRole = \App\Role::create([
            'name' => 'admin',
            'display_name' => 'Admin'
        ]);

        $adminRole->attachPermissions($perms);

        // admin
        $admin = \App\Amicus\UserHelper::createUser(array(
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'active' => 1
        ));

        $admin->attachRole($adminRole);
    }
}