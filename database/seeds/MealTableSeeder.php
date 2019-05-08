<?php

use Illuminate\Database\Seeder;

class MealTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
        foreach (range(1,10) as $index) {
            DB::table('meals')->insert([
                'title' => $faker->foodName,
            ]);
        }
    }
}
