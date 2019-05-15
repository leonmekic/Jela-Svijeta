<?php

use Faker\Generator as Faker;

$factory->define(
    \App\Models\Category::class,
    function (Faker $faker) {
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
        static $order = 1;

        return [
            'title' => $faker->dairyName,
            'slug'  => 'category ' . $order++,
        ];
    }
);
