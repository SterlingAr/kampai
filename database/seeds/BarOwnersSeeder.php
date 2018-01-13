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
        factory(App\Bar::class,3)
            ->create()
            ->each(function ($bar){

                $bar->user()->associate(factory(App\User::class)->make());

            });

    }
}
