<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        factory(App\User::class,4)
//            ->create()
//            ->each(function ($user){
//                $bar =factory(App\Bar::class)->make();
//                $user->bars()->save();
//                $bar->user()->associate($bar);
//
//            });

        $user = factory(App\User::class)->make(); //Crea usuario, bar_id = null
        $bar = factory(App\Bar::class)->make(); // Crea bar, user_id = null

        $user->save();
        $user->bars()->save($bar);

//        $bar->user()->associate($user); //associate es solo para belongTo
//        $user->save();

//        $user->bars()->save($bar);
//
//        var_dump($user);


    }
}
