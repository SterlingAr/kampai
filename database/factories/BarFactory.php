<?php

use Faker\Generator as Faker;

$factory->define(App\Bar::class, function (Faker $faker) {

    $nodes = array(827737141,1662752185,1662753205,2478742656,3358548525,2456683794);
    $keywords = array('anchoas;centollo;salmón;pimientos;salazón;pintxos;bocatas;pizzas','gintonic;sidra;vino hervido;cerveza artesana;ibuprofano');

    return [
        'node' => $faker->randomElement($nodes),
        'keywords' => $faker->randomElement($keywords),

    ];
});
