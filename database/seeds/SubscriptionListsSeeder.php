<?php

use Illuminate\Database\Seeder;

class SubscriptionListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       factory(App\SubscriptionList::class,3)
            ->create()->each(function ($sub)
           {

               for ($i = 0 ; $i < 2; $i++)
               {
                   $sub->bars()->save((factory(App\Bar::class)->make()));

               }

               $user = factory(App\User::class)->create();



               $user->subscription()->save($sub);


           });



    }
}
