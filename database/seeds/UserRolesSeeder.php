<?php

use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $roles =  factory(App\Role::class,2)
            ->create()->each( function ($role) {


                $permissions = factory(App\Permission::class,3)->create();

                foreach($permissions as $permission)
                {
                    $role->permissions()->save($permission);

                }

            });

       $users =  factory(App\User::class,4)->create();

        foreach($users as $user)
        {
            foreach($roles as $role)
            {
                $user->roles()->save($role);
            }
        }


    }
}
