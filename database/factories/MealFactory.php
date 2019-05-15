<?php

use Faker\Generator as Faker;

$factory->define(
    \App\Models\Meal::class,
    function (Faker $faker) {
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
        $catID = App\Models\Category::all()->pluck('id')->toArray();
        $catID[] = null;

        return [
            'title'       => $faker->foodName(),
            'category_id' => $catID[array_rand($catID)]
        ];
    }
);
