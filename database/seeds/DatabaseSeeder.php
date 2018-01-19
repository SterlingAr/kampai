<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           $this->call(BarsTableSeeder::class);

           $this->call(UsersTableSeeder::class);

           $this->call(BarOwnersSeeder::class);

           $this->call(SubscriptionListsSeeder::class);

           $this->call(RolesTableSeeder::class);

           $this->call(PermissionsTableSeeder::class);

           $this->call(UserRolesSeeder::class);


    }
}
