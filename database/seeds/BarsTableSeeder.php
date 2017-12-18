<?php

use Illuminate\Database\Seeder;

class BarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//



         $bar = factory(App\Bar::class,2)->create();

         $user = factory(App\User::class)->make();





    }
}
