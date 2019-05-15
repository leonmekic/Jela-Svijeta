<?php

use Illuminate\Database\Seeder;

class DescriptionTranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Faker\Provider\Lorem($faker));
        foreach (\App\Models\Meal::all() as $index) {
            static $order = 1;
            DB::table('description_translations')->insert(
                [
                    'description'    => $faker->sentence(),
                    'description_id' => $order++,
                    'locale'         => 'en'
                ]
            );
        }
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Faker\Provider\Lorem($faker));
        foreach (\App\Models\Meal::all() as $index) {
            static $order1 = 1;
            DB::table('description_translations')->insert(
                [
                    'description'    => $faker->sentence(),
                    'description_id' => $order1++,
                    'locale'         => 'it'
                ]
            );
        }
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Faker\Provider\Lorem($faker));
        foreach (\App\Models\Meal::all() as $index) {
            static $order2 = 1;
            DB::table('description_translations')->insert(
                [
                    'description'    => $faker->sentence(),
                    'description_id' => $order2++,
                    'locale'         => 'de'
                ]
            );
        }
    }
}
