<?php

use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
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
            static $order = 1;
            DB::table('ingredients')->insert([
                'title' => $faker->dairyName,
                'meal_id' => $order++,
            ]);
        }
    }
}
