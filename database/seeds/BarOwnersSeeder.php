<?php

use Illuminate\Database\Seeder;

class BarOwnersSeeder extends Seeder
{
    /**
     * Make users that own a bar and a bar owned by those users.
     *
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class,3)
            ->create()
            ->each(function ($owner)
            {

                $owner->bars()->save(factory(App\Bar::class)->make());

            });




    }
}
