<?php

use Faker\Generator as Faker;

$factory->define(App\Permission::class, function(Faker $faker){

    $name=array('read','create','update','delete');

    return[
        'name'=> $faker->randomElement($name)
    ];
});