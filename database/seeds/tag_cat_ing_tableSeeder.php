<?php

use Illuminate\Database\Seeder;

class tag_cat_ing_tableSeeder extends Seeder
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
            DB::table('tags_translation')->insert([
                'title' => $faker->beverageName(),
                'tag_id' => $order++,
                'locale' => 'en'
            ]);
        }
        $faker2 = \Faker\Factory::create();
        $faker2->addProvider(new \FakerRestaurant\Provider\ja_JP\Restaurant($faker2));
        foreach (range(1,10) as $index) {
            static $order = 1;
            DB::table('ingredients_translation')->insert([
                'title' => $faker2->dairy(),
                'ingredient_id' => $order++,
                'locale' => 'de'
            ]);
        }
        $faker3 = \Faker\Factory::create();
        $faker3->addProvider(new \FakerRestaurant\Provider\fr_FR\Restaurant($faker3));
        foreach (range(1,10) as $index) {
            static $order = 1;
            DB::table('categories_translation')->insert([
                'title' => $faker3->fruitName(),
                'category_id' => $order++,
                'locale' => 'it'
            ]);
        }
    }
}
