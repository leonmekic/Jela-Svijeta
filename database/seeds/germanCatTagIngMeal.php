<?php

use Illuminate\Database\Seeder;

class germanCatTagIngMeal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\ja_JP\Restaurant($faker));
        foreach (\App\Models\Tag::all() as $index) {
            static $order = 1;
            DB::table('tag_translations')->insert(
                [
                    'title'  => $faker->beverageName(),
                    'tag_id' => $order++,
                    'locale' => 'de'
                ]
            );
        }
        $faker2 = \Faker\Factory::create();
        $faker2->addProvider(new \FakerRestaurant\Provider\ja_JP\Restaurant($faker2));
        foreach (\App\Models\Ingredient::all() as $index) {
            static $order1 = 1;
            DB::table('ingredient_translations')->insert(
                [
                    'title'         => $faker2->dairy(),
                    'ingredient_id' => $order1++,
                    'locale'        => 'de'
                ]
            );
        }
        $faker3 = \Faker\Factory::create();
        $faker3->addProvider(new \FakerRestaurant\Provider\ja_JP\Restaurant($faker3));
        foreach (\App\Models\Category::all() as $index) {
            static $order2 = 1;
            DB::table('category_translations')->insert(
                [
                    'title'       => $faker3->fruit(),
                    'category_id' => $order2++,
                    'locale'      => 'de'
                ]
            );
        }
        $faker4 = \Faker\Factory::create();
        $faker4->addProvider(new \FakerRestaurant\Provider\ja_JP\Restaurant($faker4));
        foreach (\App\Models\Meal::all() as $index) {
            static $order3 = 1;
            DB::table('meal_translations')->insert(
                [
                    'title'   => $faker3->foodName(),
                    'meal_id' => $order3++,
                    'locale'  => 'de'
                ]
            );
        }
    }
}
