<?php

use Faker\Generator as Faker;

$factory->define(App\Bar::class, function (Faker $faker) {

    $nodes = array(2161721529,2161721530,2165102908,2165102953);
    $keywords = array('anchoas;centollo;salmón;pimientos;salazón;pintxos;bocatas;pizzas','gintonic;sidra;vino hervido;cerveza artesana;ibuprofano');

    return [
//        'node' => $faker->unique()->randomElement($nodes),
        'node' => $faker->randomElement($nodes),
        'keywords' => $faker->randomElement($keywords),
//        'user_id' => function(){
//            return factory(App\User::class)->create()->id;
//        }

    ];
});
