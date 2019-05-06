<?php

use Illuminate\Database\Seeder;

class MealTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\fr_FR\Restaurant($faker));
        foreach (range(1,10) as $index) {
            DB::table('meal_translation')->insert([
                'title' => $faker->foodName
            ]);
        }
    }
}
