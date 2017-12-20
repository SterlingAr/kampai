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
        factory(App\User::class,2)
            ->create()
            ->each(function ($user){

                $bar =factory(App\Bar::class)->make();
                $user->bars()->save($bar);
                $user->bar_id = $bar->id;
                $user->save();
            });

    }
}
