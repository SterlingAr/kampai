<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Role::class,3)
            ->create()->each( function ($role) {


                $permissions = factory(App\Permission::class,3)->create();

                foreach($permissions as $permission)
                {
                    $role->permissions()->save($permission);

                }

            });

    }
}
