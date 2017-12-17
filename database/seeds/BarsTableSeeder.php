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
//        DB::table('bars')->insert([
//            'node' => 461399795,
//            'keywords' => 'anchoas;centollo;salmón;pimientos;salazón',
//        ]);
//
//        DB::table('bars')->insert([
//            'node' => 2165102908,
//            'keywords' => '"description": "Uno de los bares más galardonados de Donostia. Su colorista barra y su decoración, nos sumerge en lo más glamuroso del pintxo donostiarra. Amplia oferta de fríos y calientes, próximos en muchas ocasiones al delicatessen. Se ofrecen menús degustación de pi",
//    "description_1": "ntxos: 8 pintxos por 30€ y 10 pintxos por 35€, ambos con postre y bebida incluidos. Abierto todos los días de la semana.",
//    "name": "Bergara",',
//        ]);
//
//        DB::table('bars')->insert([
//            'node' => 2165102953,
//            'keywords' => 'anchoas;centollo;salmón;pimientos;salazón',
//        ]);

        factory(App\Bar::class, 4)->create()->each( function ($bar) {

                $bar->user()->save(factory(App\User::class)->make());

            })

        ;


    }
}
