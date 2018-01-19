<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function(Faker $faker){


    $name=array('admin','client','bar');

    return[
        'name'=> $faker->randomElement($name)
    ];
});